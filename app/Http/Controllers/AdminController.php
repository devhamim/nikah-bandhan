<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SuccessProfile;

use App\Models\UserSettingItem;
use App\Models\UserSettingField;
use App\Models\PostCategory;
use App\Models\User;
use App\Models\Page;
use App\Models\Division;
use App\Models\PageItem;
use Spatie\Permission\Models\Role;
use App\Models\MembershipPackage;
use App\Models\UserPayment;
use App\Models\Media;
use App\Models\BlogTag as Tag;
use Illuminate\Support\Facades\File;
use App\Models\WebsiteParameter;
use App\Models\Contact;
use App\Models\QuickSmsContactBulk;
use App\Models\QuickSmsContact;
use App\Models\District;
use App\Models\Log;
use GuzzleHttp\Client;
use App\Models\Upazila;
use App\Models\Upazila as Thana;
use App\Models\PostDivision;
use App\Models\PostDistrict;
use App\Models\PostThana;
use App\Models\UserProposal;
use App\Models\Blog as Post;
use App\Models\Report;
use App\Models\BlogCategory as Category;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\PertnerPreference;
use Carbon\Carbon;
use Validator;
use Auth;
use Mail;
use PDF;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Illuminate\Support\Str;


use App\Exports\UsersExport;
use App\Imports\UsersImport;
use App\Models\UserPicture;
use App\Models\SmsHistory;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;


class AdminController extends Controller
{
    public function dashboard(Request $request)
    {
        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'dashboard', 'lsbsm' => 'dashboard']);


        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }

        $pending_user = User::where('final_check', false)->get();
        $pen_p_t= UserPayment::where('status', 'pending')
        ->where('created_at', Carbon::today())->count();
        $pen_p_t_m = UserPayment::where('status', 'pending')->whereYear('created_at', date('Y'))
        ->whereMonth('created_at', date('m'))
        ->count();
        $paid_p_t=UserPayment::where('status', 'paid')
        ->where('updated_at', Carbon::today())->count();
        $paid_p_t_m=UserPayment::where('status', 'paid')->whereYear('updated_at', date('Y'))
        ->whereMonth('updated_at', date('m'))
        ->count();
        $all_u = User::withoutGlobalScopes()->count();
        $m_u= User::where('gender', 'Male')
        ->where(function($s){
            $s->where('expired_at', '<', Carbon::now());
            $s->orWhereNull('expired_at');
        })
        ->count();
        $f_u = User::where('gender', 'Female')
        // ->where('package', '<=', 0)
        ->where(function($s){
            $s->where('expired_at', '<', Carbon::now());
            $s->orWhereNull('expired_at');
        })
        ->count();
        $sub_u= User::where('expired_at', '<=', Carbon::now())->orWhereNull('expired_at')->count();
        $d_p_u=User::where('package', 3)->count();
        $g_u=User::where('package', 2)->count();
        $s_u=User::where('package', 1)->count();
        $p_u=User::where('package', 4)->count();
        $deac_u = User::withoutGlobalScopes()
            ->where('active', false)->count();

            $logUsers_count =User::has('log')->count();



        return view('admin.dashboard', compact('pending_user', 'pen_p_t','pen_p_t_m','paid_p_t','paid_p_t_m', 'all_u','m_u','f_u','sub_u','d_p_u','g_u','s_u','p_u','deac_u','logUsers_count', ));
    }

    public function admin_sendsms(Request $request){
        $validation = Validator::make(
            $request->all(),
            [
                "message" => 'required|max:150',
            ]
        );
        if ($validation->fails()) {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Something went wrong, please try again.');
        }
        $checkUserMobile=User::where('id',$request->user_id)->where('mobile','<>' ,null)->first();
        if($checkUserMobile)
        {

            $sms= new  SmsHistory;
            $sms->user_id=$request->user_id;
            $sms->message=$request->message;
            $sms->sendby_id=Auth::id();
            $sms->save();
            $checkUserMobile->SmsSend($checkUserMobile->mobile,$request->message);

            return back()->with('success', 'Successfuly Send Sms');

        }
        else{
            return back()->with('error', 'User Mobile Number is Empty');
        }

    }
    public function selectNewRole(Request $request)
    {
        $users = User::where('email', 'like', '%' . $request->q . '%')
             ->orWhere('username', 'like', '%'.$request->q.'%')
             ->orWhere('name', 'like', '%'.$request->q.'%')
            ->orWhere('mobile', 'like', '%' . $request->q . '%')
            ->select(['id', 'mobile', 'email'])->take(30)->get();
        if ($users->count()) {
            if ($request->ajax()) {
                // return Response()->json(['items'=>$users]);
                return $users;
            }
        } else {
            if ($request->ajax()) {
                return $users;
            }
        }
        // $users = User::withoutGlobalScopes()->where('email', 'like', '%' . $request->q . '%')
        //     ->orWhere('username', 'like', '%' . $request->q . '%')
        //     ->orWhere('name', 'like', '%' . $request->q . '%')
        //     ->orWhere('mobile', 'like', '%' . $request->q . '%')
        //     ->select(['id', 'email'])->take(30)->get();
        // if ($users->count()) {
        //     if ($request->ajax()) {
        //         // return Response()->json(['items'=>$users]);
        //         return $users;
        //     }
        // } else {
        //     if ($request->ajax()) {
        //         return $users;
        //     }
        // }
    }
    public function paymentAddNewPost(Request $request)
    {

        $validation = Validator::make(
            $request->all(),
            [
                "email" => 'required|email|exists:users,email',
                "package" => "required",
                "paid_amount" => "required|numeric",
                "paid_currency" => "required",
                "payment_method" => "required",
                "payment_details" => "required",
                // 'admin_comment' => 'required'
            ]
        );

        if ($validation->fails()) {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Something went wrong, please try again.');
        }

        $user = User::withoutGlobalScopes()->where('email', $request->email)->first();
        if (!$user) {
            abort(404);
        }

        $package = MembershipPackage::where('id', $request->package)
            ->first();
        if ($package) {
            $payment = UserPayment::where('user_id', $user->id)
                ->where('status', 'pending')->first();
            if ($payment) {
                return back()
                    ->with('info', 'Previous payment order of this user is pending');
            } else {
                $payment = new UserPayment;
                $payment->status = 'paid';
                $payment->membership_package_id = $package->id;
                $payment->package_title = $package->package_title;
                $payment->package_description = $package->package_description;
                $payment->package_amount = $package->package_amount;
                $payment->package_currency = $package->package_currency;
                $payment->package_duration = $package->package_duration;
                $payment->paid_amount = $request->paid_amount;
                $payment->paid_currency = $request->paid_currency;
                $payment->payment_method = $request->payment_method;
                $payment->payment_details = $request->payment_details;
                $payment->admin_comment = $request->admin_comment;
                $payment->user_id = $user->id;
                $payment->addedby_id = Auth::id();
                $payment->editedby_id = Auth::id();
                $payment->save();

                $user->package = $payment->membership_package_id;
                $expired_at = $user->expired_at;
                if ($expired_at > Carbon::now()) {
                    // dd($payment->package_duration);
                    $user->expired_at =  Carbon::parse($expired_at)->addDays($payment->package_duration);
                } else {
                    $user->expired_at = Carbon::now()->addDays($payment->package_duration);
                }

                $user->save();

                if (!(env('APP_ENV') == 'local')) {
                    Mail::send('emails.paymentAcceptedToUser', ['payment' => $payment], function ($message) use ($payment) {
                        $message->from('info@bridegroombd.com', 'bridegroombd Payment Section');
                        $message->to($payment->user->email,  '')
                            ->subject('Payment Processing Completed at ' . url('/'));
                    });


                    Mail::send('emails.newPaidPayment', ['payment' => $payment], function ($message) {
                        $message->from('info@bridegroombd.com', 'bridegroombd  Payment Section');
                        $message->to('info@bridegroombd.com',  '')
                            ->subject('New Payment Order is submitted at ' . url('/'));
                    });
                }






                ### sms api end here (masking & nonmasking seperate) ###

                $to = bdMobile(env('CONTACT_MOBILE1'));


                $msg = 'Hello Admin, New payment details: Amount: ' . $payment->paid_amount . ' ' . $payment->paid_currency . '. Package ID: ' . $payment->membership_package_id . '. User:' . $user->email;

                $url = smsUrl($to, $msg);

                // $url = "http://connect.primesoftbd.com/smsapi/non-masking?api_key={$apiKey}&smsType=text&mobileNo={$to}&smsContent={$msg}";



                $client = new Client();
                //https://stackoverflow.com/questions/46005027/handling-client-errors-exceptions-on-guzzlehttp
                try {
                    $r = $client->request('GET', $url);
                } catch (\GuzzleHttp\Exception\ConnectException $e) {
                    // This is will catch all connection timeouts
                    // Handle accordinly
                } catch (\GuzzleHttp\Exception\ClientException $e) {
                    // This will catch all 400 level errors.
                    // return $e->getResponse()->getStatusCode();
                }
                ### sms api end here (masking & nonmasking seperate) ###





                // ### sms api end here (masking & nonmasking seperate) ###

                //     $masking = smsMaskingCode();
                //     $to = env('CONTACT_MOBILE1');
                //     $username = 'info@matchinglifebd.com';
                //     $pass = '123456';
                //     $apiKey = smsApiKey();
                //     $msg = 'Hello Admin, New payment details: Amount: ' . $payment->paid_amount . ' ' . $payment->paid_currency . '. Package ID: ' . $payment->membership_package_id . '. User:'. $user->email;

                //     $url = "http://connect.primesoftbd.com/smsapi/masking?api_key={$apiKey}&smsType=text&maskingID={$masking}&mobileNo={$to}&smsContent={$msg}";


                //      $client = new Client();
                //      //https://stackoverflow.com/questions/46005027/handling-client-errors-exceptions-on-guzzlehttp
                //     try {
                //             $r = $client->request('GET', $url);
                //         } catch (\GuzzleHttp\Exception\ConnectException $e) {
                //             // This is will catch all connection timeouts
                //             // Handle accordinly
                //         } catch (\GuzzleHttp\Exception\ClientException $e) {
                //             // This will catch all 400 level errors.
                //             // return $e->getResponse()->getStatusCode();
                //         }
                //     ### sms api end here (masking & nonmasking seperate) ###

                return back()->with('success', 'Payment info successfully saved.');
            }
        }
    }
    public function pendingProfiles()
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }
        $pending_user = User::where('final_check', false)->get();
        return view('admin.pendinfprofiles', compact('pending_user'));
    }

    public function userSettingList()
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }


        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'pages', 'lsbsm' => 'userSetting']);
        $request = request();

        $fields = UserSettingField::paginate(100);
        return view('admin.userSettingList', ['fields' => $fields]);
    }


    public function userSettingFieldAdd(Request $request)
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }
        $validation = Validator::make(
            $request->all(),
            [

                'setting_field_name' => 'required|unique:user_setting_fields,title',

            ]
        );

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Something Went Worng!');
        }

        $field = new UserSettingField;
        $field->title = $request->setting_field_name;
        $field->addedby_id = Auth::id();;
        $field->save();

        Cache::forget('userSettingFields');

        return back()->with('success', 'User setting field successfully created.');
    }

    public function userSettingFieldValue()
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }

        $request = request();
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'pages', 'lsbsm' => 'userSettingFieldValue']);

        $fields = UserSettingField::with('values')->paginate(100);
        return view('admin.userSettingFieldValue', ['fields' => $fields]);
    }

    public function userSettingFieldValueAddPost(Request $request)
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }
        $validation = Validator::make(
            $request->all(),
            [

                'setting_field_name' => 'required',
                'setting_field_value' => 'required'

            ]
        );

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Something Went Worng!');
        }

        $f = trim($request->setting_field_name);
        $v = trim($request->setting_field_value);

        $field = UserSettingField::where('title', 'like', "{$f}%")->first();
        if ($field) {
            $value = new UserSettingItem;
            $value->title = $v;
            $value->field_id = $field->id;
            $value->addedby_id = Auth::id();
            $value->save();

            Cache::forget('userSettingFields');

            return back()->withInput()->with('success', 'User setting value successfully saved.');
        }
        return back()->withInput()->with('error', 'Please, select the setting name first.');
    }

    public function userSettingValueEdit($id, Request $request)
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }

        UserSettingItem::find($id)->update([
            'title' => $request->value
        ]);


        return back()->with('success', 'Value Edited Successfully');
    }


    public function webParams()
    {


        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'website', 'lsbsm' => 'webParameter']);
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }
        $post = WebsiteParameter::latest()->first();
        return view('admin.websiteParameters', [
            'post' => $post,
        ]);
    }


    public function webParamsSave(Request $request)
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }
        $validation = Validator::make(
            $request->all(),
            [

                'meta_keyword' => 'max:255',

            ]
        );


        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Something Went Worng!');
        }
        $request = request();
        $post = WebsiteParameter::firstOrCreate([]);

        $post->title = $request->title;
        $post->short_title = $request->short_title;
        $post->h1 = $request->h1;
        $post->google_analytics_code = $request->google_analytics_code;
        $post->facebook_pixel_code = $request->facebook_pixel_code;
        $post->meta_author = $request->meta_author;
        $post->meta_keyword = $request->meta_keyword;
        $post->meta_description = $request->meta_description;
        $post->slogan = $request->slogan;
        $post->package_slogan = $request->package_slogan;
        $post->footer_address = $request->footer_address;
        $post->footer_copyright = $request->footer_copyright;
        $post->addthis_url = $request->addthis_url;
        $post->fb_page_link = $request->fb_url;
        $post->youtube_url = $request->youtube_url;
        $post->instagram_url = $request->instagram_url;
        $post->pinterest_url = $request->pinterest_url;
        $post->contact_mobile = $request->contact_mobile;
        $post->contact_email = $request->contact_email;
        $post->linkedin_url = $request->linkedin_url;
        $post->twitter_url = $request->twitter_url;
        // $post->pinterest_url = $request->pinterest_url;
        $post->youtube_url = $request->youtube_url;
        // $post->google_plus_url = $request->google_plus_url;
        // $post->google_map_code = $request->google_map_code;
        // $post->main_color = $request->main_color ?: 'default';
        // $post->sub_color = $request->sub_color ?: 'default';
        // $post->header_bg_color = $request->header_bg_color ?: 'default';
        // $post->header_text_color = $request->header_text_color ?: 'default';
        // $post->footer_bg_color = $request->footer_bg_color ?: 'default';
        // $post->footer_text_color = $request->footer_text_color ?: 'default';
        $post->home_1st_part_content =$request->home_1st_part_content;
        $post->home_2nd_part_content =$request->home_2nd_part_content;

        if ($request->home_1st_part_image) {
            $file = $request->home_1st_part_image;
            Storage::disk('upload')->delete('homePage/' . $post->home_1st_part_image);

            $originalName = $file->getClientOriginalName();
            Storage::disk('upload')->put('homePage/' . $originalName, File::get($file));
            $post->home_1st_part_image = $originalName;
        }

        if ($request->home_2nd_part_image) {

            $file = $request->home_2nd_part_image;
            Storage::disk('upload')->delete('homePage/' . $post->home_2nd_part_image);

            $originalName = $file->getClientOriginalName();
            Storage::disk('upload')->put('homePage/' . $originalName, File::get($file));
            $post->home_2nd_part_image = $originalName;
        }



        if ($request->favicon) {
            $file = $request->favicon;
            // Storage::disk('upload')->delete('favicon/' . $post->favicon);

            $originalName = $file->getClientOriginalName();
            Storage::disk('upload')->put('favicon/' . $originalName, File::get($file));
            $post->favicon = $originalName;
        }

        if ($request->logo) {
            $file = $request->logo;
            Storage::disk('upload')->delete('logo/' . $post->logo);

            $originalName = $file->getClientOriginalName();
            Storage::disk('upload')->put('logo/' . $originalName, File::get($file));
            $post->logo = $originalName;
        }
        if ($request->logo_alt) {
            $file = $request->logo_alt;
            Storage::disk('upload')->delete('logo/' . $post->logo_alt);

            $originalName = $file->getClientOriginalName();
            Storage::disk('upload')->put('logo/' . $originalName, File::get($file));
            $post->logo_alt = $originalName;
        }

        // if($request->android_apk)
        // {
        //     $apk = $request->android_apk;
        //     Storage::disk('upload')->delete('apk/'.$post->android_apk);

        //     $on = $apk->getClientOriginalName();
        //     Storage::disk('upload')->put('apk/'.$on, File::get($apk));
        //     $post->android_apk = $on;
        // }

        $post->save();

        Cache::forget('websiteParameter');

        return back()->with('success', 'Website Parameter Successfully Updated.');
    }

    public function allMembershipPackages(Request $request)
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }
        // if (!Auth::user()->hasPermission('package')) {
        //     abort(401);
        // }

        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'package', 'lsbsm' => 'allMembershipPackages']);

        $packages = MembershipPackage::get();

        return view('admin.allMembershipPackages', [
            'packages' => $packages
        ]);
    }


    public function membershipPackageAddNew(Request $request,MembershipPackage $package)
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }
        // if (!Auth::user()->hasPermission('package')) {
        //     abort(401);
        // }

        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'package', 'lsbsm' => 'membershipPackageAddNew']);

        return view('admin.membershipPackageNew',['package'=>$package]);
    }


    public function membershipPackageAddNewPost(Request $request)
    {


        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }
        $validation = Validator::make(
            $request->all(),
            [

                'title' => 'required|unique:membership_packages,package_title',
                // 'description' => 'required',
                'price' => 'required',
                'currency' => 'required',
                'duration' => 'required'

            ]
        );

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Something Went Worng!');
        }


        $package = new MembershipPackage;
        $package->package_title = $request->title;
        $package->package_description = $request->description;
        $package->package_amount = $request->price;
        $package->package_currency = $request->currency;
        $package->package_duration = $request->duration;
        $package->package_type = $request->package_type;
        $package->proposal_send_daily_limit = $request->proposal_send_daily_limit;
        $package->proposal_send_total_limit = $request->proposal_send_total_limit;
        $package->contact_view_limit = $request->contact_view_limit;
        $package->package_tags = json_encode($request->tag);
        $package->package_attr =$request->package_attr;
        $package->discounted_amount =$request->discounted_amount;
        $package->bonus_duration =$request->bonus_duration;
        $package->status = $request->status;
        $package->save();
        if ($request->hasFile('image')) {

            $file = $request->image;
            $fimgExt = strtolower($file->getClientOriginalExtension());
            $fimageNewName = str_random(8) . time() . '.' . $fimgExt;
            $fileOriginalName = strtolower($file->getClientOriginalName());

            Storage::disk('upload')->put('package/' . $fimageNewName, File::get($file));

            $package->image_name = $fimageNewName;
            $package->image_original_name = $fileOriginalName;
        }















        Cache::forget('mPackage1');
        Cache::forget('mPackage2');


        return back()
            ->with('success', 'New Package Successfully Created.');
    }


    public function membershipPackageEdit(Request $request, MembershipPackage $package)
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }
        // if (!$package) {
        //     abort(404);
        // }
        return view('admin.packageEdit', [
            'package' => $package
        ]);
    }



    public function membershipPackageUpdate(Request $request, MembershipPackage $package)
    {

        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }

        if (!$package) {
            abort(404);
        }

        $package->package_title = $request->title;
        $package->package_description = $request->description;
        $package->package_type = $request->package_type;
        $package->package_currency = $request->currency;
        $package->package_amount = $request->price;

        $package->package_duration = $request->duration;
        $package->proposal_send_daily_limit = $request->proposal_send_daily_limit;
        $package->proposal_send_total_limit = $request->proposal_send_total_limit;

        $package->package_tags = json_encode($request->tag);
        $package->package_attr =$request->package_attr;
        $package->discounted_amount =$request->discounted_amount;
        $package->bonus_duration =$request->bonus_duration;
        $package->contact_view_limit = $request->contact_view_limit;

        if ($request->hasFile('image')) {

            $file = $request->image;
            $fimgExt = strtolower($file->getClientOriginalExtension());
            $fimageNewName = str_random(8) . time() . '.' . $fimgExt;
            $fileOriginalName = strtolower($file->getClientOriginalName());

            Storage::disk('upload')->put('package/' . $fimageNewName, File::get($file));

            $package->image_name = $fimageNewName;
            $package->image_original_name = $fileOriginalName;
        }

        $package->tag_1 = $request->tag_1;
        $package->tag_2 = $request->tag_2;
        $package->status = $request->status;

        $package->save();

        Cache::forget('mPackage1');
        Cache::forget('mPackage2');

        return back()
            ->with('success', 'Package Successfully Updated.');
    }

    public function users()
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }


        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'userP', 'lsbsm' => 'users']);
        $users = User::get();
        return view('admin.userlist', compact('users'));
    }

    public function userpanel()
    {
        if (!Auth::user()->hasRole('Admin')) {
            abort(401);
        }
        $users = User::get();
        return view('admin.userpanel', compact('users'));
    }


    public function pagesAll(Request $request)
    {
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'pages', 'lsbsm' => 'pagesAll']);

        $pages = Page::orderBy('page_title')->paginate(50);
        return view('admin.pagesAll', ['pages' => $pages]);
    }



    public function pageAddNewPost(Request $request)
    {

        // if (!Auth::user()->hasPermission('page')) {
        //     abort(401);
        // }
        // dd($request->all());
        $validation = Validator::make(
            $request->all(),
            [
                'page_title' => 'required|max:50|string',
                'route_name' => 'required|max:50|string|unique:pages,route_name',
            ]
        );
        if ($validation->fails()) {
            return back()->withErrors($validation)
                ->withInput()
                ->with('error', 'Something went wrong.');
        }


        $page = new Page;
        $page->page_title = $request->page_title;
        $page->title_hide = $request->title_hide ? 1 : 0;
        $page->active = $request->active ? 1 : 0;
        $page->left_sidebar = $request->left_sidebar ? 1 : 0;
        $page->list_in_menu = $request->list_in_menu ? 1 : 0;
        $page->route_name = $request->route_name ? str_slug(strtolower($request->route_name)) : null;
        $page->meta_title = $request->meta_title ?: null;
        $page->meta_description = $request->meta_description ?: null;
        $page->meta_keywords = $request->meta_keywords ?: null;

        $page->addedby_id = Auth::id();
        $page->save();


        return back()->with('success', 'New Page Created Successfully!');
    }


    public function pageEdit(Request $request, Page $page)
    {
        return view('admin.pages.pageEdit', ['page' => $page]);
    }

    public function pageItems(Request $request, Page $page)
    {
        // $mediaAll = Media::latest()->paginate(200);
        return view('admin.pages.pageItems', [
            'page' => $page,
            // 'mediaAll' => $mediaAll
        ]);
    }



    public function pageItemAddPost(Request $request, Page $page)
    {

        // return $request->description;
        $validation = Validator::make(
            $request->all(),
            [
                'title' => 'required|max:50|string',
                'description' => 'required|max:60000',
            ]
        );
        if ($validation->fails()) {
            return back()->withErrors($validation)
                ->withInput()
                ->with('error', 'Something went wrong.');
        }

        $item = new PageItem;
        $item->page_id = $page->id;
        $item->title = $request->title ?: null;
        $item->content = $request->description ?: null;
        $item->editor = $request->editor ? 1 : 0;
        $item->active = $request->active ? 1 : 0;
        $item->addedby_id = Auth::id();
        $item->save();


        return back()->with('success', 'Page Item Created Successfully!');
    }


    public function pageItemEditEditor(Request $request, PageItem $item)
    {
        if ($item->editor) {
            $item->editor = false;
        } else {
            $item->editor = true;
        }
        $item->save();

        return back();
    }


    public function pageItemEdit(Request $request, PageItem $item)
    {
        $medias = Media::latest()->paginate(100);

        return view('admin.pages.pageItemEdit', [
            'it' => $item,
            'page' => $item->page,
            'medias' => $medias
        ]);
    }


    public function pageItemDelete(Request $request, PageItem $item)
    {
        $item->delete();

        return back()->with('success', 'Part of the Page Deleted Successfully');
    }


    public function pageEditPost(Request $request, Page $page)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'page_title' => 'required|max:50|string',
                'route_name' => 'required|max:50|string|unique:pages,route_name,' . $page->id,
            ]
        );
        if ($validation->fails()) {
            return back()->withErrors($validation)
                ->withInput()
                ->with('error', 'Something went wrong.');
        }

        $page->page_title = $request->page_title;
        $page->title_hide = $request->title_hide ? 1 : 0;
        $page->active = $request->active ? 1 : 0;
        $page->left_sidebar = $request->left_sidebar ? 1 : 0;
        $page->list_in_menu = $request->list_in_menu ? 1 : 0;
        $page->route_name = $request->route_name ? str_slug(strtolower($request->route_name)) : null;

        $page->meta_title = $request->meta_title ?: null;
        $page->meta_description = $request->meta_description ?: null;
        $page->meta_keywords = $request->meta_keywords ?: null;

        $page->editedby_id = Auth::id();
        $page->save();


        return back()->with('success', 'Page Updated Successfully!');
    }


    public function pageDelete(Request $request, Page $page)
    {
        $page->items()->delete();
        $page->delete();

        return back()->with('success', 'Page Deleted Successfully');
    }



    public function allPendingPayments(Request $request)
    {
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'payments', 'lsbsm' => 'allPendingPayments']);
        $payments = UserPayment::where('status', 'pending')->latest()->paginate(100);
        $packages = MembershipPackage::all();
        return view('admin.allPendingPayments', [
            'payments' => $payments,
            'packages' => $packages
        ]);
    }

    public function allPaidPayments(Request $request)
    {
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'payments', 'lsbsm' => 'allPaidPayments']);
        $payments = UserPayment::where('status', 'paid')->where('paid_amount', '<>', 0)->latest()->paginate(100);
        return view('admin.paidPayments', [
            'payments' => $payments,
        ]);
    }


    public function pendingPaymentUpdatePost(Request $request, UserPayment $payment)
    {
        $validation = Validator::make(
            $request->all(),
            [
                "package" => "required",
                "paid_amount" => "required|numeric",
                "paid_currency" => "required",
                "payment_method" => "required",
                "payment_details" => "required",
                // 'admin_comment' => 'required'
            ]
        );
        if ($validation->fails()) {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Something went wrong, please try again.');
        }

        $package = MembershipPackage::where('id', $request->package)
            ->first();
        if ($package) {
            if ($payment) {
                $payment->status = 'paid';
                $payment->membership_package_id = $package->id;
                $payment->package_title = $package->package_title;
                $payment->package_description = $package->package_description;
                $payment->package_amount = $package->package_amount;
                $payment->package_currency = $package->package_currency;
                $payment->package_duration = $package->package_duration;
                $payment->paid_amount = $request->paid_amount;
                $payment->paid_currency = $request->paid_currency;
                $payment->payment_method = $request->payment_method;
                $payment->payment_details = $request->payment_details;
                $payment->admin_comment = $request->admin_comment;
                $payment->editedby_id = Auth::id();
                $payment->save();

                $user = $payment->user;
                $user->package = $payment->membership_package_id;
                $expired_at = $user->expired_at;
                if ($expired_at > Carbon::now()) {
                    $user->expired_at = Carbon::parse($expired_at)->addDays($payment->package_duration);
                } else {
                    $now = Carbon::now();
                    $user->expired_at = Carbon::parse($now)->addDays($payment->package_duration);
                }

                $user->save();


                return back()->with('success', 'Payment info successfully updated.');
            }
        }
    }

    public function paymentDelete(Request $request, UserPayment $payment)
    {
        $payment->delete();
        return back()->with('info', 'Payment info deleted successfully.');
    }

    public function paymentAddNew(Request $request)
    {

        // if (!Auth::user()->hasPermission('payment')) {
        //     abort(401);
        // }

        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'payments', 'lsbsm' => 'paymentAddNew']);
        $packages = MembershipPackage::all();
        $users=User::get();
        return view('admin.payments.paymentAddNew', [
            'packages' => $packages,
            'users'    =>  $users
        ]);
    }



    public function pageItemUpdate(Request $request, PageItem $item)
    {

        $item->title = $request->title ?: null;
        $item->content = $request->description ?: null;
        $item->editor = $request->editor ? 1 : 0;
        $item->active = $request->active ? 1 : 0;
        $item->editedby_id = Auth::id();
        $item->save();


        return back()->with('success', 'Page Item Updated Successfully!');
    }

    public function allContact(Request $request)
    {
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'contact', 'lsbsm' => 'allContact']);
        $contacts = Contact::where('seen_status', true)->paginate(50);
        // dd($contacts);
        return view('admin.contactold', [
            'contacts' => $contacts
        ]);
    }



    public function newContact(Request $request)
    {


        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'contact', 'lsbsm' => 'newContact']);
        $contacts = Contact::where('seen_status', false)->paginate(50);
        // dd($contacts);

        Contact::where('seen_status', false)->update([
            'seen_status' => true,
        ]);

        return view('admin.contactold', [
            'contacts' => $contacts
        ]);
    }




    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];

        $pdf = PDF::loadView('user.profile3', $data);

        return $pdf->download('itsolutionstuff.pdf');
    }



    public function profilePost(Request $request, $id)
    {

        // dd($request->religious_view);


        $me=auth()->user();
        $looking_for="";
        if ($request->gender == "Male") {
            $looking_for = "Bride";
        }
        if ($request->gender == "Female") {
            $looking_for = "Groom";
        }

        if($id)
        {
            $profile=User::find($id);
        }
        else
        {
            $profile = Auth::user();
        }

        // dd($profile);

        if (!$profile) {
            $profile = new User;
            $profile->user_id = $me->id;
            $profile->addedby_id = $me->id;
        }
        $profile->name = $request->name;
        $profile->profile_created_by = $request->profile_created_by;
        $profile->dob = $request->dob;
        $profile->religion = $request->religion;
        // $profile->caste = $request->caste;
        $profile->religious_view = $request->religious_view;

        $profile->package = $request->package ?: null;


        if($request->package )
        {
        $package = MembershipPackage::where('id', $request->package)->first();
        $expired_at = $profile->expired_at;
        if ($expired_at > Carbon::now()) {
            $profile->expired_at = Carbon::parse($expired_at)->addDays($package->package_duration);
        } else {
            $profile->expired_at = Carbon::now()->addDays($package->package_duration);
        }
        }




        $profile->looking_for = $looking_for;
        $profile->gender = $request->gender;

        if(strcmp($profile->mobile,$request->mobile) == 1){
            $profile->mobile_verified = Null;
        }
        $profile->mobile = $request->mobile;
        // $profile->active = true;
        $profile->guardian_mobile = $request->guardian_mobile;
        $profile->country = $request->country;
        $profile->marital_status = $request->marital_status;
        $profile->height = $request->height;
        $profile->blood_group = $request->blood_group;
        $profile->children_have = $request->children_have;
        $profile->present_division = $request->present_division;
        $profile->present_district = $request->present_district;
        $profile->present_thana = $request->present_thana;
        // $profile->present_vill = $request->present_vill;
        $profile->present_po = $request->present_po;
        $profile->weight = $request->weight;
        $profile->citizenship_status = $request->citizenship_status;

        $profile->parmanent_division = $request->parmanent_division;
        $profile->parmanent_district = $request->parmanent_district;
        $profile->parmanent_thana = $request->parmanent_thana;
        // $profile->parmanent_vill = $request->parmanent_vill;
        $profile->parmanent_po = $request->parmanent_po;
        $profile->education_level = $request->education_level;
        // $profile->education_status = $request->education_status;
        $profile->major_subject = $request->major_subject;
        $profile->university = $request->university;
        // $profile->degree_name = $request->degree_name;
        $profile->profession = $request->profession;
        $profile->workplace = $request->workplace;
        $profile->designation = $request->designation;
        $profile->annual_income = $request->annual_income;
        $profile->skin_color = $request->skin_color;
        $profile->eye_color = $request->eye_color;
        $profile->hair_color = $request->hair_color;
        $profile->body_type = $request->body_type;
        $profile->disability = $request->disability;
        $profile->drink = $request->drink;
        $profile->smoke = $request->smoke;
        $profile->diet = $request->diet;
        $profile->zodiac_sign = $request->zodiac_sign;
        $profile->family_type = $request->family_type;
        $profile->family_status = $request->family_status;
        $profile->no_of_member = $request->no_of_member;
        $profile->family_value = $request->family_value;
        // $profile->color = $request->color;



        // $profile->movie = $request->movie;
        $profile->location = $request->location;
        $profile->interests = $request->interests;
        $profile->hobby = $request->hobby;
        $profile->mother_tongue = $request->mother_tongue;
        $profile->grewup_in = $request->grewup_in;
        $profile->personal_value = $request->personal_value;

        if ($request->can_speak) {
            $profile->can_speak = implode(', ', $request->can_speak);
        } else {
            $profile->can_speak= null;
        }

        if ($request->music) {
            $profile->music = implode(', ', $request->music);
        } else {
            $profile->music = null;
        }
        // $profile->music = $request->music;

        if ($request->cooking) {
            $profile->cooking = implode(', ', $request->cooking);
        } else {
            $profile->cooking = null;
        }

        if ($request->dress) {
            $profile->dress = implode(', ', $request->dress);
        } else {
            $profile->dress = null;
        }

        if ($request->book) {
            $profile->book = implode(', ', $request->book);
        } else {
            $profile->book= null;
        }

        if ($request->movie) {
            $profile->movie = implode(', ', $request->movie);
        } else {
            $profile->movie = null;
        }

        $profile->father_prof = $request->father_prof;
        $profile->mother_prof = $request->mother_prof;
        $profile->no_bro = $request->no_bro;
        $profile->no_bro_m = $request->no_bro_m;
        $profile->no_sis = $request->no_sis;
        $profile->no_sis_m = $request->no_sis_m;
        $profile->call_time = $request->call_time;
        $profile->contact_person = $request->contact_person;
        $profile->relation_with_contact = $request->relation_with_contact;
        $profile->permanent_country = $request->permanent_country;
        $profile->present_country = $request->present_country;
        if ($request->profile_img) {
            $file = $request->profile_img;
            // Storage::disk('upload')->delete('favicon/' . $post->favicon);

            $originalName = $file->getClientOriginalName();
            Storage::disk('upload')->put('profile/' . $originalName, File::get($file));
            $profile->profile_img = $originalName;
        }

        if ($request->user_type) {
            $profile->user_type = 'offline';
        } else {
            $profile->user_type = 'online';
        }

        if ($request->featured) {
            $profile->featured = true;
        } else {
            $profile->featured = false;
        }

        if ($request->final_check) {
            $profile->final_check = true;
        } else {
            $profile->final_check = false;
        }
        // dd($profile->final_check);
        // $profile->user_id =  $me->id;
        $profile->editedby_id = Auth::id();
        $profile->save();



        $pertner = $profile->pertnerPreference;

        if (!$pertner) {
            $pertner = new PertnerPreference();
            $pertner->user_id = $profile->id;
        }
        $pertner->min_age = $request->age_min;
        $pertner->max_age = $request->age_max;
        $pertner->min_height = $request->height_min;
        $pertner->max_height = $request->height_max;
        $pertner->religion = $request->p_religion;
        $pertner->children = $request->p_children;
        $pertner->marital_status = $request->p_marital_status;
        if ( $request->p_study) {
           $pertner->study = implode(', ',  $request->p_study);
        } else {
           $pertner->study = null;
        }

        if ( $request->p_profession) {
            $pertner->profession = implode(', ',  $request->p_profession);
         } else {
            $pertner->profession = null;
         }

// dd( $pertner->profession);
         if ( $request->p_skin_color) {
            $pertner->skin_color = implode(', ',  $request->p_skin_color);
         } else {
            $pertner->skin_color = null;
         }


        $pertner->physical_disability = $request->p_physical_disability;





        if( $pertner->save())
        {
            return redirect()->back()->with('success', 'Information Updated Successfully');

        }
        else
        {
            redirect()->back()->with('error',"Something Wents wrong");
        }
    }

    public function postAddNew(Request $request)
    {
        // dd('ok');
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'blog','lsbsm'=>'blogAddNew']);

        $post = Post::where('publish_status', 'temp')->first();
        $cats = Category::all();
        $divs = Division::all();
        $mediaAll = Media::latest()->paginate(200);
        if(!$post)
        {
            $post = new Post;
            $post->addedby_id = Auth::id();
            $post->save();
        }
        return view('blogAdmin.posts.postAddNew',[
            'post'=>$post,
            'cats'=>$cats,
            'divs'=>$divs,
            'mediaAll'=>$mediaAll
        ]);
    }

    public function postAddNew2(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'blog','lsbsm'=>'blogAddNew']);

        $post = Post::where('publish_status', 'temp')->first();
        $cats = Category::all();
        $divs = Division::all();
        $mediaAll = Media::latest()->paginate(200);
        if(!$post)
        {
            $post = new Post;
            $post->addedby_id = Auth::id();
            $post->save();
        }
        return view('admin.blogAdd',[
            'post'=>$post,
            'cats'=>$cats,
            'divs'=>$divs,
            'mediaAll'=>$mediaAll
        ]);
    }


    public function aboutPostNewPost(Request $request){

        $validation = Validator::make($request->all(),
        [
          // "title" => "title"
          // "description" => "required"
          // "publish" => "on"
            'excerpt' => 'max:254|required',
            'feature_image' => 'image|dimensions:min_with=300,min_height=200,ratio=3/2'
        ]);

        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Wrong!');
        }

        if($request->tags)
        {
            foreach($request->tags as $tag)
            {
                $t = Tag::where('title',$tag)->first();
                if(!$t)
                {
                   $t = new Tag;
                   $t->title = $tag;
                   // $t->addedby_id = Auth::id();
                   $t->save();
                }
            }
        }

        $post = Post::where('publish_status', 'temp')->first();
        if(!$post){
            $post = new Post;
            $post->addedby_id = Auth::id();
            $post->save();
        }

        $post->title = $request->title ?: null;
        $post->slug = Str::slug($request->title);

        $post->description = $request->description ?: null;
        $post->excerpt = $request->excerpt ?: null;
        $post->publish_status = $request->publish ? 'published' : 'draft';
        $post->front_slider = $request->front_slider ? true : false;
        $post->meta_title = $request->meta_title ?: null;
        $post->meta_keywords = $request->meta_keywords ?: null;
        $post->meta_description = $request->meta_description ?: null;
        $post->headline = $request->headline ? true : false;
        // $post->highlight = $request->highlight ? true : false;
        $post->addedby_id = Auth::id();

        if($request->tags)
        {
            $post->tags = implode(', ',$request->tags);
        }else
        {
            $post->tags = null;
        }


        if($request->hasFile('feature_image'))
        {

            $ffile = $request->feature_image;
            $fimgExt = strtolower($ffile->getClientOriginalExtension());
            $fimageNewName = str_random(8).time().'.'.$fimgExt;
            $originalName = $ffile->getClientOriginalName();

            Storage::disk('upload')->put('media/image/'.$fimageNewName, File::get($ffile));

                if($post->feature_img_name)
                {

                    Storage::disk('upload')->delete('media/image/'.$post->feature_img_name);
                }

            $post->feature_img_name = $fimageNewName;
            $post->feature_img_original_name = $originalName;
            $post->feature_img_ext = $fimgExt;
        }

        $post->save();


        $post->blogCategories()->detach();
        if($request->categories)
        {
            foreach($request->categories as $cat)
            {
                $c = PostCategory::where('category_id',$cat)->where('post_id',$post->id)->first();
                if(!$c)
                {
                   $c = new PostCategory;
                   $c->category_id = $cat;
                   $c->post_id = $post->id;
                   $c->addedby_id = Auth::id();
                   $c->save();
                }
            }
        }

        $post->divisions()->detach();
        if($request->division)
        {
            $division = Division::where('id',$request->division)->first();
            if($division)
            {
                $c = PostDivision::where('division_id',$division->id)->where('post_id',$post->id)->first();
                if(!$c)
                {
                   $c = new PostDivision;
                   $c->division_id = $division->id;
                   $c->post_id = $post->id;
                   $c->addedby_id = Auth::id();
                   $c->save();
                }

                $post->districts()->detach();
                if($request->district)
                {
                    $district = District::where('name',$request->district)
                    ->where('division_id', $division->id)->first();
                    if($district)
                    {
                        $c = PostDistrict::where('district_id',$district->id)->where('post_id',$post->id)->first();
                        if(!$c)
                        {
                           $c = new PostDistrict;
                           $c->district_id = $district->id;
                           $c->post_id = $post->id;
                           $c->addedby_id = Auth::id();
                           $c->save();
                        }

                        $post->thanas()->detach();
                        if($request->thana)
                        {
                            $thana = Thana::where('name',$request->thana)
                            ->where('division_id', $division->id)
                            ->where('district_id', $district->id)
                            ->first();
                            if($thana)
                            {
                                $c = PostThana::where('thana_id',$thana->id)->where('post_id',$post->id)->first();
                                if(!$c)
                                {
                                   $c = new PostThana;
                                   $c->thana_id = $thana->id;
                                   $c->post_id = $post->id;
                                   $c->addedby_id = Auth::id();
                                   $c->save();
                                }
                            }
                        }
                    }
                }
            }
        }

        Cache::flush();

        return redirect()->route('admin.postEdit',$post)->with('success', 'New post successfully created.');
    }



    // public function selectTagsOrAddNew(Request $request)
    // {
    //   $tags = Tag::where('title', 'like', '%' . $request->q . '%')
    //     ->select(['title'])->take(30)->get();
    //   if ($tags->count()) {
    //     if ($request->ajax()) {
    //       return $tags;
    //     }
    //   } else {
    //     if ($request->ajax()) {
    //       return $tags;
    //     }
    //   }
    // }


    public function selectTagsOrAddNew(Request $request)
    {
        // return("saif vai");

        $tags = Tag::where('title', 'like', '%' . $request->q . '%')
            ->select(['title'])->take(30)->get();
        if ($tags->count()) {
            if ($request->ajax()) {
                // dd( $tags);
                return $tags;
            }
        } else {
            if ($request->ajax()) {

                return $tags;
            }
        }
    }



    public function postEdit(Post $post, Request $request){
        // dd(1);
        $cats = Category::all();
        $oldTags = $post->tags ? explode(", ",$post->tags) : null;
        $divs = Division::all();
        $dist = $post->districts()->first();
        $thana = $post->thanas()->first();
        $mediaAll = Media::latest()->paginate(200);
        return view('admin.blogEdit',[
            'post'=>$post,
            'cats'=>$cats,
            'oldTags'=>$oldTags,
            'divs'=>$divs,
            'mediaAll'=>$mediaAll,
            'dist'=>$dist,
            'thana'=>$thana
        ]);
    }


    public function newStory(Request $request)
    {

        // if (!Auth::user()->hasPermission('website')) {
        //     abort(401);
        // }

        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'story', 'lsbsm' => 'newStory']);
        return view('admin.newStory');
    }


    public function newStoryPost(Request $request)
    {
        // dd($request->all());



        $validation = Validator::make(
            $request->all(),
            [

                // 'categoryTitleBn' => 'required|min:2|max:200',
                // 'categoryImage'=> 'required|dimensions:ratio=800/350'

                "title" => "required|max:50|string",
                "location" => "string|max:100",
                "marriage_date" => 'date',
                // "bride_username" => 'string|max:50',
                // "groom_username" => 'string|max:50',
                "details" => "required|string|min:4",
                "featureImage" => "required"
                // "featureImage" => "required|dimensions:ratio=800/400"
            ]
        );
        if ($validation->fails()) {
            return redirect()->route('admin.newStory')
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Something went wrong.');
        }


        $image = $request->file('featureImage');
        $imageName = time() . '.' . $image->getClientOriginalExtension();

        Storage::disk('upload')
            ->put('stories/' . $imageName, File::get($image));

        $page = new SuccessProfile;

        $page->title = $request->title;
        $page->location = $request->location;
        $page->bride_username = $request->bride_username;
        $page->groom_username = $request->groom_username;
        $page->marriage_date = $request->marriage_date;
        $page->description = $request->details;
        $page->image_name = $imageName;
        $page->addedby_id = Auth::id();
        $page->save();

        // Cache::flush();

        Cache::forget('frontStories');


        return redirect()->route('admin.newStory')->with('success', 'New Story Uploaded Successfully!');
    }



    public function allStories(Request $request)
    {

        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'story', 'lsbsm' => 'allStory']);
        $stories = SuccessProfile::orderby('id', 'desc')->paginate(50);

        return view('admin.allStory', ['stories' => $stories]);
    }

    public function editStory(Request $request, SuccessProfile $story)
    {
        return view('admin.editStory', ['story' => $story]);
    }

    public function editStoryPost(Request $request, SuccessProfile $story)
    {
        $validation = Validator::make(
            $request->all(),
            [

                // 'categoryTitleBn' => 'required|min:2|max:200',
                // 'categoryImage'=> 'required|dimensions:ratio=800/350'

                "title" => "required|max:50|string",
                "location" => "string|max:100",
                "marriage_date" => 'date',
                // "bride_username" => 'string|max:50',
                // "groom_username" => 'string|max:50',
                "details" => "required|string|min:4",
            ]
        );
        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Something went wrong.');
        }

        if ($request->hasFile('featureImage')) {
            $image = $request->file('featureImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            Storage::disk('upload')
                ->put('stories/' . $imageName, File::get($image));

            Storage::disk('upload')->delete('stories/' . $story->image_name);

            $story->image_name = $imageName;
        }

        $story->title = $request->title;
        $story->location = $request->location;
        $story->bride_username = $request->bride_username;
        $story->groom_username = $request->groom_username;
        $story->marriage_date = $request->marriage_date;
        $story->description = $request->details;
        $story->editedby_id = Auth::id();
        $story->save();

        // Cache::flush();

        Cache::forget('frontStories');


        return back()->with('success', 'Story Successfully updated.');
    }
    public function deleteStory(Request $request, SuccessProfile $story)
    {
        // Storage::disk('upload')->delete('stories/'. $story->image_name);
        $story->delete();

        Cache::forget('frontStories');

        return back()->with('success', 'Story Successfully Deleted.');
    }

    public function postsAll(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'blog','lsbsm'=>'allPost']);
        $posts = Post::where('publish_status','<>','temp')->orderby('id','desc')->paginate(20);
        return view('admin.allBlog',['posts'=>$posts]);
    }

    public function postDelete(Post $post, Request $request){

        if($post->feature_img_name)
        {
            Storage::disk('upload')->delete('media/image/'.$post->feature_img_name);
            $post->feature_img_name = null;
            $post->save();
        }


        $post->delete();

        Cache::flush();

        return back()->with('success', 'Post successfully deleted.');
    }



    public function postUpdate(Post $post, Request $request){

        $validation = Validator::make($request->all(),
        [
          // "title" => "title"
          // "description" => "required"
          // "publish" => "on"
            'excerpt' => 'max:254|required',
            'feature_image' => 'image|dimensions:min_with=300,min_height=200,ratio=3/2'
        ]);

        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Wrong!');
        }

        if($request->tags)
        {
            foreach($request->tags as $tag)
            {
                $t = Tag::where('title',$tag)->first();
                if(!$t)
                {
                   $t = new Tag;
                   $t->title = $tag;
                   // $t->addedby_id = Auth::id();
                   $t->save();
                }
            }
        }

        $post->title = $request->title ?: null;
        $post->slug = Str::slug($request->title);
        $post->description = $request->description ?: null;
        $post->excerpt = $request->excerpt ?: null;
        $post->publish_status = $request->publish ? 'published' : 'draft';
        $post->front_slider = $request->front_slider ? true : false;
        $post->headline = $request->headline ? true : false;
        // $post->highlight = $request->highlight ? true : false;

        $post->meta_title = $request->meta_title ?: null;

        $post->meta_keywords = $request->meta_keywords ?: null;

        $post->meta_description = $request->meta_description ?: null;

        $post->editedby_id = Auth::id();

        if($request->tags)
        {
            $post->tags = implode(', ',$request->tags);
        }else
        {
            $post->tags = null;
        }

        if($request->hasFile('feature_image'))
        {

            $ffile = $request->feature_image;
            $fimgExt = strtolower($ffile->getClientOriginalExtension());
            $fimageNewName = str_random(8).time().'.'.$fimgExt;
            $originalName = $ffile->getClientOriginalName();

            Storage::disk('upload')->put('media/image/'.$fimageNewName, File::get($ffile));

                if($post->feature_img_name)
                {

                    Storage::disk('upload')->delete('media/image/'.$post->feature_img_name);
                }

            $post->feature_img_name = $fimageNewName;
            $post->feature_img_original_name = $originalName;
            $post->feature_img_ext = $fimgExt;
        }

        $post->save();

        $post->blogCategories()->detach();
        if($request->categories)
        {
            foreach($request->categories as $cat)
            {
                $c = PostCategory::where('category_id',$cat)->where('post_id',$post->id)->first();
                if(!$c)
                {
                   $c = new PostCategory;
                   $c->category_id = $cat;
                   $c->post_id = $post->id;
                   $c->addedby_id = Auth::id();
                   $c->save();
                }
            }
        }

        $post->divisions()->detach();
        if($request->division)
        {
            $division = Division::where('id',$request->division)->first();
            if($division)
            {
                $c = PostDivision::where('division_id',$division->id)->where('post_id',$post->id)->first();
                if(!$c)
                {
                   $c = new PostDivision;
                   $c->division_id = $division->id;
                   $c->post_id = $post->id;
                   $c->addedby_id = Auth::id();
                   $c->save();
                }

                $post->districts()->detach();
                if($request->district)
                {
                    $district = District::where('name',$request->district)
                    ->where('division_id', $division->id)->first();
                    if($district)
                    {
                        $c = PostDistrict::where('district_id',$district->id)->where('post_id',$post->id)->first();
                        if(!$c)
                        {
                           $c = new PostDistrict;
                           $c->district_id = $district->id;
                           $c->post_id = $post->id;
                           $c->addedby_id = Auth::id();
                           $c->save();
                        }

                        $post->thanas()->detach();
                        if($request->thana)
                        {
                            $thana = Thana::where('name',$request->thana)
                            ->where('division_id', $division->id)
                            ->where('district_id', $district->id)
                            ->first();
                            if($thana)
                            {
                                $c = PostThana::where('thana_id',$thana->id)->where('post_id',$post->id)->first();
                                if(!$c)
                                {
                                   $c = new PostThana;
                                   $c->thana_id = $thana->id;
                                   $c->post_id = $post->id;
                                   $c->addedby_id = Auth::id();
                                   $c->save();
                                }
                            }
                        }
                    }
                }
            }
        }

        Cache::flush();

        return redirect()->route('admin.postEdit',$post)->with('success', 'Post successfully updated.');
    }


    public function usersAll(Request $request)
    {

        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'user','lsbsm'=>'allUser']);
        $users=User::where('active','<>',0)->orderBy('id', 'DESC')->paginate(50);
        return view('admin.allUsers', compact('users'));

    }




    public function userSearchAjax(Request $request)
    {
        $users = User::where('email', 'like',"%{$request->q}%")
            ->orWhere('name', 'like', "%{$request->q}%")
            ->orWhere('mobile', 'like' , "%{$request->q}%")
            ->orWhere('id', 'like', "%{$request->q}%")
            ->latest()
            ->take(40)
            ->get();

            // dd($users);

        $i = 1;

        if ($request->ajax()) {
            return Response()->json(['page' => view('admin.users.ajax.usersTbody', ['users' => $users , 'i' =>$i])->render()]);
        }
    }


    public function proposalsGroup(Request $request)
    {
        $type = $request->type;
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'proposal','lsbsm'=>$type]);

        if($type == 'pending_proposals')
        {
            $proposalsAll = UserProposal::has('user')->has('userSecond')->where('accepted', false)->orderBy('checked')->paginate(50);
        }elseif ($type == 'accepted_proposals')
        {
            $proposalsAll = UserProposal::has('user')->has('userSecond')->where('accepted', true)->orderBy('checked')->paginate(50);
        }else
        {
            $proposalsAll = UserProposal::has('user')->has('userSecond')->orderBy('checked')->paginate(50);

        }


        return view('admin.proposalsGroup', [
            'proposalsAll' => $proposalsAll,
            'type' => $type
        ]);
    }




    public function proposalCheckedByAdmin(Request $request, UserProposal $proposal)
    {
        if($proposal->checked)
        {
            $proposal->checked = 0;

        }else
        {
            $proposal->checked = 1;
        }
        $proposal->editedby_id = Auth::id();
        $proposal->save();

        if($request->ajax())
        {
              return Response()->json([
                'success' => true
              ]);
        }
        return back();
    }


    public function reportsAll(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'report','lsbsm'=>'reportsAll']);
        $reports = Report::latest()->paginate(40);
        // dd($reports);
        return view('admin.reportsAll',['reports'=>$reports]);
    }


    public function reportChecked(Report $report)
    {
        $report->status = 'checked';
        $report->editedby_id = Auth::id();
        $report->save();

        return back()->with('success', 'Report status successfully changed to checked');
    }

    public function reportDelete(Report $report)
    {
        $report->delete();
        return back()->with('success', 'Report successfully deleted.');
    }




    public function usersGroup(Request $request)
    {

        // if (!Auth::user()->hasPermission('users')) {
        //     abort(401);
        // }

        $type = $request->type;
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'users', 'lsbsm' => $type]);



        if ($type == 'profile_picture_pending') {
            $usersAll = User::whereHas('userPictures', function ($query) {
                $query->where('image_type', 'profilepic');
                $query->where('checked', false);
                $query->where('autoload', true);
            })
                ->latest()->paginate(50);
        } elseif ($type == 'cv_new_pending') {

            $usersAll = User::whereNotNull('file_name')->where('cv_checked', 0)->latest()->paginate(50);
        } elseif ($type == 'all_unchecked_users') {

            $usersAll = User::where('final_checked', false)

                ->whereDoesntHave('userPictures', function ($query) {
                    $query->where('image_type', 'profilepic');
                    $query->where('checked', true);
                    // $query->where('autoload', true);
                })

                ->whereDoesntHave('personalInfo', function ($query) {
                    $query->where('checked', true);
                })

                ->whereDoesntHave('personalActivity', function ($query) {
                    $query->where('checked', true);
                })

                ->whereNull('expired_at')

                ->latest()->paginate(50);
        } elseif ($type == 'all_checked_users') {

            $usersAll = User::where('final_checked', true)
                ->orWhere('checked', true)
                ->orWhereNotNull('expired_at')

                ->orWhere(function ($p) {
                    $p->whereHas('userPictures', function ($query) {
                        $query->where('image_type', 'profilepic');
                        $query->where('checked', true);
                        // $query->where('autoload', true);
                    });
                })

                ->orWhere(function ($p) {
                    $p->whereHas('personalInfo', function ($query) {
                        $query->where('checked', true);
                    });
                })

                ->orWhere(function ($p) {
                    $p->whereHas('personalActivity', function ($query) {
                        $query->where('checked', true);
                    });
                })



                ->latest()->paginate(50);
        } elseif ($type == 'final_check_pending') {
            $usersAll = User::has('personalInfo')
                ->has('personalActivity')
                ->where('final_checked', false)
                ->latest()->paginate(50);
        } elseif ($type == 'order_by_age') {
            $usersAll = User::orderBy('dob', 'desc')->paginate(50);
        } elseif ($type == 'active_users') {
            $usersAll = User::withoutGlobalScopes()
                ->where('active', true)
                ->latest()->paginate(50);
        } elseif ($type == 'inactive_users') {
            $usersAll = User::withoutGlobalScopes()
                ->where('active', false)
                ->latest()->paginate(50);

        } elseif ($type == 'inactive_male_users') {
            $usersAll = User::withoutGlobalScopes()
                ->where('active', false)
                ->where('gender', 'Male')
                ->latest()->paginate(50);
        } elseif ($type == 'inactive_female_users') {
            $usersAll = User::withoutGlobalScopes()
                ->where('active', false)
                ->where('gender', 'Female')
                ->latest()->paginate(50);
        } elseif ($type == 'male_users') {
            $usersAll = User::where('gender', 'Male')
                ->latest()->paginate(50);
        } elseif ($type == 'female_users') {
            $usersAll = User::where('gender', 'Female')
                ->latest()->paginate(50);
        } elseif ($type == 'validity_10') {
            $usersAll = User::where('expired_at', '>=', Carbon::now())
                ->where('expired_at', '<', Carbon::now()->addDays(10))
                ->latest()->paginate(50);
        } elseif ($type == 'validity_30') {
            $usersAll = User::where('expired_at', '<=', Carbon::now())
                ->where('expired_at', '<', Carbon::now()->addDays(30))
                ->latest()->paginate(50);
        } elseif ($type == 'basic_info_pending') {
            $usersAll = User::where('checked', false)
                ->latest()->paginate(50);
        } elseif ($type == 'personal_info_pending') {
            $usersAll = User::whereHas('personalInfo', function ($query) {
                $query->where('checked', false);
            })->latest()->paginate(50);
        } elseif ($type == 'personal_activity_pending') {
            $usersAll = User::whereHas('personalActivity', function ($query) {
                $query->where('checked', false);
            })
                ->latest()->paginate(50);
        } elseif ($type == 'golden') {
            $usersAll = User::where('package', 2)
                ->where('expired_at', '>=', Carbon::now())
                ->latest()->paginate(50);
            // dd("golden");
        } elseif ($type == 'golden_plus') {
            $usersAll = User::whereIn('package', [2, 6])
                ->where('expired_at', '>=', Carbon::now())
                ->latest()->paginate(50);
        } elseif ($type == 'diamond') {
            $usersAll = User::where('package', 3)
                ->where('expired_at', '>=', Carbon::now())
                ->latest()->paginate(50);
            // dd("diamond");
        } elseif ($type == 'silver') {
            $usersAll = User::where('package', 1)
                ->where('expired_at', '>=', Carbon::now())
                ->latest()->paginate(50);
            // dd("silver");
        } elseif ($type == 'diamond_plus') {
            $usersAll = User::where('package', 4)
                ->where('expired_at', '>=', Carbon::now())
                ->latest()->paginate(50);
        } elseif ($type == 'platinum') {
            $usersAll = User::where('package', 4)
                ->where('expired_at', '>=', Carbon::now())
                ->latest()->paginate(50);
            // dd("platinum");
        } elseif ($type == 'free_package') {
            $usersAll = User::where('package', 0)
                ->where('expired_at', '>=', Carbon::now())
                ->where('expired_at', '<', Carbon::now()->addDays(14))
                ->latest()->paginate(50);
        }
        elseif ($type == 'silver') {
            $usersAll = User::where('package', 1)
                ->where('expired_at', '>=', Carbon::now())
                ->where('expired_at', '<', Carbon::now()->addDays(14))
                ->latest()->paginate(50);
        } elseif ($type == 'subscribers') {
            $usersAll = User::where('expired_at', '<=', Carbon::now())
                ->orWhereNull('expired_at')
                ->latest()->paginate(50);
        } elseif ($type == 'online_users') {
            $usersAll = User::where('loggedin_at', '>=', Carbon::now()->subMinutes(4))
                ->latest()->paginate(50);
        } elseif ($type == 'offline_user') {
            $usersAll = User::withoutGlobalScopes()
                ->where('user_type', 'offline')
                ->latest()->paginate(50);
        } elseif ($type == 'today_registered') {

            $usersAll = User::whereDate('created_at', Carbon::today())->latest()->paginate(50);
        } elseif ($type == 'today_inactive') {

            $usersAll = User::withoutGlobalScopes()
                ->whereDate('inactive_at', Carbon::today())->latest()
                ->where('active', false)
                ->paginate(50);
        } elseif ($type == 'this_month_registered') {

            $usersAll = User::whereYear('created_at', date('Y'))
                ->whereMonth('created_at', date('m'))->latest()->paginate(50);
        } elseif ($type == 'this_month_inactive') {

            $usersAll = User::withoutGlobalScopes()
                ->where('active', false)
                ->whereYear('inactive_at', date('Y'))
                ->whereMonth('inactive_at', date('m'))->latest()->paginate(50);
        }
        elseif($type == 'log_users')
        {
            // dd(1);

            $usersAll =User::has('log')->paginate(50);

        }
        else {

            return redirect()->route('admin.usersAll');
        }


        return view('admin.usersGroup', [
            'users' => $usersAll,
            'type' => $type
        ]);
    }


    public function userSms(Request $request)
    {
        $user = User::withoutGlobalScopes()->where('id', $request->user)->first();

        if ($user) {
            return view('admin.users.userSms', ['user' => $user]);
        }

        return back();
    }

    public function smsSendToUser(Request $request)
    {
        $user = User::where('id', $request->user)->first();

        if (!$user) {
            if ($request->ajax()) {
                return Response()->json(['success' => false]);
            }
            abort(404);
        }

        if (env('APP_ENV') == 'production') {
            // $user->smsSendToUser();
            $user->sendCustomSmsToUser($request->details);
        }

        $user->sms_count = $user->sms_count + 1;
        $user->save();

        if ($request->ajax()) {
            return Response()->json([
                'success' => true,
                'sms_count' => $user->sms_count
            ]);
        }
        return back()->with('success', 'SMS successfully Sent.');
    }

    //sms end


    public function categoriesAll(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'blog','lsbsm'=>'categoriesAll']);

        $cats = Category::all();
        return view('admin.categories.categoriesAll',['cats'=>$cats]);
    }


    public function categoryEdit(Category $cat, Request $request)
    {

        if($request->ajax())
        {

            return Response()->json(View('admin.categories.ajax.catTbodyEdit',[
                'cat' => $cat,
            ])->render());
        }


    }


    public function categoryAddNew(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'blog','lsbsm'=>'categoryAddNew']);
        return view('admin.categories.categoryAddNew');
    }


    public function categoryAddNewPost(Request $request){

        $validation = Validator::make($request->all(),
        [
          'category'=> 'required|min:2|max:100|unique:blog_categories,title'
        ]);
        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Wrong!');
        }

        $cat = new Category;
        $cat->title = $request->category;
        // $cat->addedby_id = $request->user()->id;
        $cat->save();

        Cache::flush();

        return back()->with('success', 'New Category Successfully Created.');
    }


    public function divisionsAll(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'blog','lsbsm'=>'divisionsAll']);

        $divs = Division::all();
        return view('blogAdmin.divisions.divisionsAll',['divs'=>$divs]);
    }


    public function districtsAll(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'blog','lsbsm'=>'districtsAll']);

        $divs = Division::all();
        return view('blogAdmin.divisions.districtsAll',['divs'=>$divs]);
    }

    public function thanaAll(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'blog','lsbsm'=>'thanaAll']);

        $districts = District::all();
        return view('blogAdmin.divisions.thanaAll',['districts'=>$districts]);
    }




    public function selectDistrictForPost(Request $request)
    {

        $districts = District::where('division_id', $request->division)
        ->where('name', 'like', '%'.$request->q.'%')
        ->select(['name as district'])
        ->get();


        if($districts->count())
        {
            if ($request->ajax())
            {
                // return Response()->json(['items'=>$users]);
                return $districts;
            }
        }
        else
        {
            if ($request->ajax())
            {
                return $districts;
            }
        }
    }


    public function selectThanaForPost(Request $request)
    {
        $district = District::where('name',$request->district)->first();
        if($district)
        {
            $thanas = Upazila::where('district_id', $district->id)
            ->where('name', 'like', '%'.$request->q.'%')
            ->select(['name as thana'])
            ->get();

            if($thanas->count())
            {
                if ($request->ajax())
                {
                    return $thanas;
                }
            }
            else
            {
                if ($request->ajax())
                {
                    return $thanas;
                }
            }
        }

    }


    public function divisionAddNewPost(Request $request){

        $validation = Validator::make($request->all(),
        [
          'division'=> 'required|min:2|max:100|unique:divisions,name'
        ]);
        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Wrong!');
        }

        $div = new Division;
        $div->name = $request->division;
        $div->addedby_id = $request->user()->id;
        $div->save();

        Cache::flush();


        return back()->with('success', 'New division Successfully Created.');
    }



    public function categoryUpdate(Category $cat, Request $request)
    {
        // dd($request->all());
        // return $cat;
    // dd(1);
        // $validation = Validator::make($request->all(),
        // [
        //     'name'=> 'required|min:2|max:100|unique:blog_categories,title',
        // ]);
        // if($validation->fails())
        // {
        //     return Response()->json(View('blogAdmin.categories.ajax.catTable',[
        //         'cat' => $cat,
        //     ])->render());
        // }
        $name = $request->name;
        $cat_old_name = $cat->title;
        $cat->title = $name ?: $cat_old_name;
        // $cat->editedby_id = Auth::id();
        $cat->save();
        return back()->with('success',"Category Updated Successfully");
    }




    public function categoryDelete(Category $cat, Request $request)
    {
        $cat->posts()->detach();
        $cat->delete();

        Cache::flush();

        // if($request->ajax())
        // {
        //     return Response()->json(['success'=>true]);
        // }



        return back()->with('success',"Category Deleted Successfully");
    }



    public function divisionUpdate(Division $div, Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'name'=> 'required|min:2|max:100|unique:divisions,name',
        ]);
        // if($validation->fails())
        // {
        //     return Response()->json(View('blogAdmin.divisions.ajax.divTable',[
        //         'div' => $div,
        //     ])->render());
        // }
        $name = $request->name;
        $div_old_name = $div->name;
        $div->name = $name ?: $div_old_name;
        $div->editedby_id = Auth::id();
        $div->save();
        Cache::flush();
        // if($request->ajax())
        // {
        //     return Response()->json(View('blogAdmin.divisions.ajax.divTable',[
        //         'div' => $div,
        //     ])->render());
        // }
        return back()->with('success',"Division Updated Successfully");
    }

    public function divisionDelete(Division $div, Request $request)
    {
        $div->posts()->detach();
        $div->districts()->delete();
        $div->thanas()->delete();
        $div->delete();

        Cache::flush();

        // if($request->ajax())
        // {
        //     return Response()->json(['success'=>true]);
        // }
        return back()->with('success',"Division Deleted Successfully");
    }


    public function districtUpdate(District $district, Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'name'=> 'required|min:2|max:100|unique:districts,name',
        ]);
        // if($validation->fails())
        // {
        //     return Response()->json(View('blogAdmin.divisions.ajax.districtTBody',[
        //         'district' => $district,
        //     ])->render());
        // }

        $name = $request->name;
        $district_old_name = $district->name;
        $district->name = $name ?: $district_old_name;
        $district->editedby_id = Auth::id();
        $district->save();

        Cache::flush();

        // if($request->ajax())
        // {
        //     return Response()->json(View('blogAdmin.divisions.ajax.districtTBody',[
        //         'district' => $district,
        //     ])->render());
        // }
        return back()->with('success', "District Updated Successfully");
    }

    public function districtAddNewPost(Request $request){

        $validation = Validator::make($request->all(),
        [
          'division'=> 'required|exists:divisions,name',
          'district'=> 'required|min:2|max:100|unique:districts,name'
        ]);
        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Wrong!');
        }

        $div = Division::where('name', $request->division)->first();

        $dis = new District;
        $dis->name = $request->district;
        $dis->division_id = $div->id;
        $dis->addedby_id = $request->user()->id;
        $dis->save();

        Cache::flush();

        return back()
        ->withInput()
        ->with('success', 'New District Successfully Created.');
    }


    public function districtDelete(District $district, Request $request)
    {
        // $district->posts()->detach();
        $district->thanas()->delete();
        $district->delete();

        Cache::flush();

        // if($request->ajax())
        // {
        //     return Response()->json(['success'=>true]);
        // }
        return back()->with('success',"District deleted sucessfully");
    }



    public function quickSmsBalanceCheck(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'sms','lsbsm'=>'quickSmsBalanceCheck']);

        $url = smsBalanceUrl();
        // dd($url);


        $client = new Client();
             # $response = $client->request('GET', $url);

             //https://stackoverflow.com/questions/46005027/handling-client-errors-exceptions-on-guzzlehttp

        try {
            // dd(1);

                $r = $client->request('GET', $url);
                // dd($r);

                $balance = $r->getBody()->getContents();


                return view('admin.sms.quickSmsBalanceCheck', ['balance' => $balance]);

                // $r->getBody()->getContents()


            } catch (\GuzzleHttp\Exception\ConnectException $e) {
                // This is will catch all connection timeouts
                // Handle accordinly
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                // This will catch all 400 level errors.
                // return $e->getResponse()->getStatusCode();
            }

            return back();
    }


    public function featureImageDelete(Request $request, Post $post){

        // dd($request->all());
        if($post->feature_img_name)
        {
            Storage::disk('upload')->delete('media/image/'.$post->feature_img_name);
            $post->feature_img_name = null;
            $post->save();
        }

        Cache::flush();

        return back();
    }



    public function quickSmsDraft()
    {
        // dd(1);
        $request = request();
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'sms','lsbsm'=>'quickSmsDraft']);
        $ip = $request->ip();


        return view('admin.sms.quickSmsDraft',['ip'=>$ip]);
    }



    public function quickSmsDraftSave(Request $request)
    {
        // dd();
        $validation = Validator::make($request->all(),
        [
            "recipients" => "required",
            // "sender_number" => "required|numeric",
            "message" => "required|string",
            // 'accept'=>'required'

        ]);

        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Wrong!');
        }

        if($request->recipients)
        {

            $bulk = new QuickSmsContactBulk;
            $bulk->addedby_id = Auth::id();
            $bulk->sent_from = $request->sender_number ?: null;
            $bulk->message = $request->message;


            $rs = trim($request->recipients);
            $rs = rtrim($rs,',');
            $rs = explode(",",$rs);
            // dd($rs);

            foreach($rs as $number)
            {
                $number = bdMobile($number);
                // dd($number);

                // dd(strlen($number));
                if(strlen($number) == 13)
                {
                    $bulk->status = 'draft'; //temp,draft,sent
                    $bulk->save();

                    $sms = new QuickSmsContact;
                    $sms->quick_sms_contact_bulk_id = $bulk->id;
                    $sms->mobile = $number;
                    $sms->status = 'draft'; //temp,draft,sent
                    $sms->addedby_id = Auth::id();
                    $sms->save();
                }


            }

            if((!$bulk->id) or (!$bulk->contacts->count()))
            {

                return back()
                ->withInput()
                ->with('error', 'Sorry, Try again with bangladeshi valid mobile numbers.');
            }

            return back()->with('success','Your Draft Successfully Saved.');
        }
    }
    public function quickSms()
    {
        $client = new Client();
        $url="http://smpp.ajuratech.com/portal/sms/smsConfiguration/smsClientBalance.jsp?client=vipmarraigemedia";

        try{
            // dd(1);

                $r = $client->request('GET', $url);
                // dd($r);

                $balance = $r->getBody()->getContents();
               $balanceData=json_decode($balance);


            } catch (\GuzzleHttp\Exception\ConnectException $e) {
                // This is will catch all connection timeouts
                // Handle accordinly
                return back();
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                // This will catch all 400 level errors.
                // return $e->getResponse()->getStatusCode();
                return back();
            }


















        $request = request();
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'sms','lsbsm'=>'quickSms']);
        $ip = $request->ip();
        return view('admin.sms.quickSms',['ip'=>$ip,'balanceData'=>$balanceData->Balance]);
    }


    public function quickSmsSend(Request $request)
    {


         $validation = Validator::make($request->all(),
        [
            "recipients" => "required",
            // "sender_number" => "required|numeric",
            "message" => "required|string",
            // 'accept'=>'required'


        ]);

        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Wrong!');
        }

        if($request->recipients)
        {
            $bulk = new QuickSmsContactBulk;
            $bulk->addedby_id = Auth::id();
            $bulk->sent_from = $request->masking ? $request->sender_number : null;
            $bulk->message = $request->message;
            $rs = trim($request->recipients);
            $rs = rtrim($rs,',');
            $rs = explode(",",$rs);
            // dd($rs);

            foreach($rs as $number)
            {
                $number = bdMobile($number);

                if(strlen($number) == 13)
                {
                    $bulk->status = 'sent'; //temp,draft,sent
                    $bulk->save();

                    $sms = new QuickSmsContact;
                    $sms->quick_sms_contact_bulk_id = $bulk->id;
                    $sms->mobile = $number;
                    $sms->status = 'sent'; //temp,draft,sent
                    $sms->addedby_id = Auth::id();
                    $sms->save();
                }
            }


            // dd($bulk);

            if($request->masking == "on"){
                if((!$bulk->id) or (!$bulk->contacts->count()))
                {

                    return back()->with('error', 'Sorry, There is no contacts.');
                }
                $msg = trim($request->message);
                $msg = urlencode($msg);

                foreach ($rs as $contact) {
                    $to= $contact;

                    $url = smsUrlMasking($to,$msg);

                    $client = new Client();

                    try {
                            $r = $client->request('GET', $url);
                        } catch (\GuzzleHttp\Exception\ConnectException $e) {
                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                        }
                }

            }else{

                if((!$bulk->id) or (!$bulk->contacts->count()))
                {

                    return back()->with('error', 'Sorry, There is no contacts.');
                }
                $msg = trim($request->message);
                $msg = urlencode($msg);
                // $contacts = '';
                // dd($rs);
                foreach ($rs as $contact) {
                    $to= $contact;

                    $url = smsUrl($to,$msg);
                    // dd($url);

                    $client = new Client();

                    try {
                            $r = $client->request('GET', $url);
                        } catch (\GuzzleHttp\Exception\ConnectException $e) {
                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                        }
                }

            }
       }
            return back()->with('success','Your Quick SMS successfully sent.');
        }

    public function sentSmsBulk()
    {
        $request = request();
        if ($request->ajax())
        {
            if($request->type == 'business_sms')
            {
                $page = View('admin.sms.ajax.businessSmsBulks')->render();
            }
            if($request->type == 'quick_sms')
            {
                $page = View('admin.sms.ajax.quickSmsBulks')->render();
            }
            if($request->type == 'uploaded_sms')
            {
                $page = View('admin.sms.ajax.uploadedSmsBulks')->render();
            }
            return Response()->json([
                'page' => $page,
                'success'=>true
            ]);
        }
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'sms','lsbsm'=>'sentSmsBulk']);
        // $bulks = SmsContactBulk::latest()->paginate(10);
        // $quickBulks = QuickSmsContactBulk::latest()->paginate(1);
        return view('admin.sms.sentSmsBulk');
    }


    public function quickSmsBulkItems(QuickSmsContactBulk $bulk, Request $request)
    {
        // return 1;
        if ($request->ajax())
        {
            // return 1;
            return Response()->json([
                'page' => View('admin.sms.ajax.quickSmsBulkItems',['bulk' => $bulk])->render(),
                'success' => true
            ]);
        }
        return back();
    }

    public function quickSmsBulkItemsResend(QuickSmsContactBulk $bulk, Request $request)
    {
        $nb = new QuickSmsContactBulk;
        $nb->addedby_id = Auth::id();
        $nb->sent_from = $bulk->sent_from;
        $nb->message = $bulk->message;
        $nb->save();
        foreach($bulk->contacts as $contact)
        {
            $sms = new QuickSmsContact;
            $sms->quick_sms_contact_bulk_id = $nb->id;
            $sms->mobile = $contact->mobile;
            $sms->status = 'draft'; //temp,draft,sent
            $sms->addedby_id = Auth::id();
            $sms->save();
        }

        if(QuickSmsContact::where('quick_sms_contact_bulk_id',$nb->id)->first())
        {
            $nb->status = 'draft';
            $nb->save();
            return redirect()->route('admin.quickSmsDraft')->with('info', 'See the SMS Draft Bulk list in the left side. Send from here.');
        }
        else
        {
            $nb->delete();
            return back()->with('error', 'Sorry, Some errors occurred.');
        }
    }

    public function quickSmsDraftSend(QuickSmsContactBulk $bulk, Request $request)
    {
        if ($request->ajax())
        {
            return Response()->json([
                'page' => View('admin.sms.ajax.quickSmsDraftSend',[
                    'bulk'=> $bulk,
                    'ip'=>$request->ip()
                ])->render(),
                'success' => true
            ]);
        }

        return back();
    }


    public function sendEmailSmsToUsers(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'sms','lsbsm'=>'sendEmailSmsToUsers']);

        $post = WebsiteParameter::firstOrCreate([]);


        return view('admin.sms.sendEmailSmsToUsers', [
            'post' => $post
        ]);
    }




    public function sendEmailSmsToUsersPost(Request $request)
    {
        $validation = Validator::make($request->all(),
        [
            'message_to_users' => 'required',
            'send_to' => 'required',
            'send_type' => 'required',
        ]);
        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something went wrong.');
        }
        $text = $request->message_to_users;
        $type = $request->send_type;
        $to = $request->send_to;
        $post = WebsiteParameter::firstOrCreate([]);
        $post->message_to_users = $text;
        $post->save();
        if($to == 'incomplete_users')
        {
            User::where('user_type', 'online')
            ->whereNull('expired_at')
            ->where('final_checked', false)
            ->whereNull('img_name')
            ->whereDoesntHave('personalInfo', function ($query) {
                $query->where('checked', true);
              })
            ->whereDoesntHave('personalActivity', function ($query) {
                $query->where('checked', true);
              })
            ->whereDoesntHave('contactInfo', function ($query) {
                $query->where('checked', true);
              })
            ->orderBy('id')->chunk(100, function ($users) use($type, $text)
            {
                foreach ($users as $user)
                {
                    if($type == 'email')
                    {
                        $user->sendEmailWithMessage($text);
                    }
                    elseif($type == 'sms')
                    {
                        $user->sendSmsWithMessage($text);
                    }else
                    {
                        $user->sendEmailWithMessage($text);
                        $user->sendSmsWithMessage($text);
                    }
                }
            });
        }
        elseif($to == 'all_users')
        {
            User::where('user_type', 'online')
            ->orderBy('id')->chunk(100, function ($users) use($type, $text)
            {
                foreach ($users as $user)
                {
                    if($type == 'email')
                    {
                        $user->sendEmailWithMessage($text);
                    }
                    elseif($type == 'sms')
                    {
                        $user->sendSmsWithMessage($text);
                    }else
                    {
                        $user->sendEmailWithMessage($text);
                        $user->sendSmsWithMessage($text);
                    }
                }
            });
        }
        elseif($to == 'completed_users')
        {
            User::whereNotNull('img_name')
            ->where('user_type', 'online')
            ->where(function($p){
                $p->orWhere('checked', true);
                $p->orWhere('final_checked', true);

            })
            ->orWhere(function($p){
                $p->whereHas('personalInfo', function ($query) {
                $query->where('checked', true);
              });
            })
            ->orWhere(function($p){
                $p->whereHas('personalActivity', function ($query) {
                $query->where('checked', true);
              });
            })
            ->orWhere(function($p){
                $p->whereHas('contactInfo', function ($query) {
                $query->where('checked', true);
              });
            })
            ->orderBy('id')->chunk(100, function ($users) use($type, $text)
            {
                foreach ($users as $user)
                {
                    if($type == 'email')
                    {
                        $user->sendEmailWithMessage($text);
                    }
                    elseif($type == 'sms')
                    {
                        $user->sendSmsWithMessage($text);
                    }else
                    {
                        $user->sendEmailWithMessage($text);
                        $user->sendSmsWithMessage($text);
                    }
                }
            });
        }
        elseif($to == 'no_login_thirty_days')
        {
            User::where('loggedin_at', '<', Carbon::now()->subDays(29))
            ->where('user_type', 'online')
            ->orderBy('id')->chunk(100, function ($users) use($type, $text)
            {
                foreach ($users as $user)
                {
                    if($type == 'email')
                    {
                        $user->sendEmailWithMessage($text);
                    }
                    elseif($type == 'sms')
                    {
                        $user->sendSmsWithMessage($text);
                    }else
                    {
                        $user->sendEmailWithMessage($text);
                        $user->sendSmsWithMessage($text);
                    }
                }
            });
        }
        elseif($to == 'free_users')
        {
            User::where('user_type', 'online')
            ->where(function($q){
                $q->where('expired_at', '<=', Carbon::now());
                $q->orWhereNull('expired_at');
            })
            ->orderBy('id')->chunk(100, function ($users) use($type, $text)
            {
                foreach ($users as $user)
                {
                    if($type == 'email')
                    {
                        $user->sendEmailWithMessage($text);
                    }
                    elseif($type == 'sms')
                    {
                        $user->sendSmsWithMessage($text);
                    }else
                    {
                        $user->sendEmailWithMessage($text);
                        $user->sendSmsWithMessage($text);
                    }
                }
            });
        }elseif($to == 'paid_members')
        {
            User::where('user_type', 'online')
            ->where('expired_at', '>=', Carbon::now())
            ->where('package', '>', 0)

            ->orderBy('id')->chunk(100, function ($users) use($type, $text)
            {
                foreach ($users as $user)
                {
                    if($type == 'email')
                    {
                        $user->sendEmailWithMessage($text);
                    }
                    elseif($type == 'sms')
                    {
                        $user->sendSmsWithMessage($text);
                    }else
                    {
                        $user->sendEmailWithMessage($text);
                        $user->sendSmsWithMessage($text);
                    }
                }
            });
        }
        elseif($to == 'deactivate_users')
        {
            User::where('user_type', 'online')
            ->withoutGlobalScopes()
            ->where('active', false)
            ->orderBy('id')->chunk(100, function ($users) use($type, $text)
            {
                foreach ($users as $user)
                {
                    if($type == 'email')
                    {
                        $user->sendEmailWithMessage($text);
                    }
                    elseif($type == 'sms')
                    {
                        $user->sendSmsWithMessage($text);
                    }else
                    {
                        $user->sendEmailWithMessage($text);
                        $user->sendSmsWithMessage($text);
                    }
                }
            });
        }
        return back()->with('success', "({$type}) message successfully sent to ({$to})");
    }


    public function sendProfileToGivenEmail(Request $request)
    {

        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'sms','lsbsm'=>'sendProfileToGivenEmail']);

        // $mails = User::withoutGlobalScopes()
        // ->where('active', 1)
        // ->orderBy('id', 'desc')
        // ->limit(100)
        // ->get();

        $mails = [];

        $districts = District::select(['name as title'])->orderBy('name')->get();

        return view('admin.users.sendProfileToGivenEmail',[
            'emails' => $mails,
            'districts' => $districts
        ]);
    }






    public function sendProfileToGivenEmailPost(Request $request)
    {
        $email = $request->email;


        $ids = $request->ids;

        if($ids)
        {
            $ids = array_slice($ids, 0, 20);

            $users = User::withoutGlobalScopes()->whereIn('id', $ids)->get();


            Auth::user()->sendUserProfileToEmail($email,$users);

        }




        // foreach($request->ids as $id)
        // {
        //     $u = User::withoutGlobalScopes()->find($id);

        //     if($u)
        //     {
        //         $u->sendUserCvToEmail($email);
        //         // $u->getCvEmailFromUser($user);
        //     }

        // }

            if($request->ajax())
            {
                return Response()->json([
                'success' => true,

                ]);
            }
            return back();
    }



    public function selectProfileUsers(Request $request)
    {
        // dd($request->all());
        // return $request->all();


        $mails = User::withoutGlobalScopes()
        ->where('active', 1)
        ->whereNotNull('profile_img')
        ->where(function($q) use ($request){
            if($request->user_type)
            {
                $q->where('user_type', $request->user_type);
            }

            if($request->religion)
            {
                $q->where('religion', $request->religion);
            }

            if($request->gender)
            {
                $q->where('gender', $request->gender);
            }

            // if($request->min_age)
            // {
            //     $now = Carbon::now();
            //     $minAgeDate = $now->SubYear($request->min_age)->toDateString();

            //     $q->where('dob', '<=', $minAgeDate);
            // }

            // if($request->max_age)
            // {
            //     $now = Carbon::now();
            //     $maxAgeDate = $now->SubYear($request->max_age + 1)->toDateString();
            //     $q->where('dob', '>=', $maxAgeDate);
            // }

            // if($request->profession or $request->education_level
            //     or $request->district or $request->marital_status)
            // {
            //     $q->whereHas('personalInfo', function ($query) use ($request)
            //    {
            //         if($request->profession)
            //         {
            //             $query->where('my_profession', $request->profession);
            //         }

            //         if($request->education_level)
            //         {
            //             $query->where('education_level', $request->education_level);
            //         }

            //         if($request->district)
            //         {
            //             $query->where('district', $request->district);
            //         }

            //         if($request->marital_status)
            //         {
            //             $query->where('marital_status', $request->marital_status);
            //         }

            //     });
            // }
        })
        ->orderBy('id', $request->order_by)
        ->limit($request->limit)
        ->get();

        // return  $mails;

        if($request->ajax())
        {
            return Response()->json([

                'success' => true,

                'page'=>View('admin.users.ajax.emailsOfProfile',[
                'emails'=>$mails,
                ])->render()

            ]);
        }
    }



    public function sendCvToGivenEmail(Request $request)
    {

        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'sms','lsbsm'=>'sendCvToGivenEmail']);

        // $mails = User::withoutGlobalScopes()
        // ->where('active', 1)
        // ->orderBy('id', 'desc')
        // ->limit(100)
        // ->get();

        $mails = [];

        $districts = District::select(['name as title'])->orderBy('name')->get();

        return view('admin.users.sendCvToGivenEmail',[
            'emails' => $mails,
            'districts' => $districts
        ]);
    }




    public function selectCvUsers(Request $request)
    {
        // dd($request->all());
        // return 1;

        $mails = User::withoutGlobalScopes()
        ->where('active', 1)
        ->whereNotNull('profile_img')
        ->where('cv_checked', 1)
        ->where(function($q) use ($request){
            if($request->user_type)
            {
                $q->where('user_type', $request->user_type);
            }

            if($request->religion)
            {
                $q->where('religion', $request->religion);
            }

            if($request->gender)
            {
                $q->where('gender', $request->gender);
            }

            // if($request->min_age)
            // {
            //     $now = Carbon::now();
            //     $minAgeDate = $now->SubYear($request->min_age)->toDateString();

            //     $q->where('dob', '<=', $minAgeDate);
            // }

            // if($request->max_age)
            // {
            //     $now = Carbon::now();
            //     $maxAgeDate = $now->SubYear($request->max_age + 1)->toDateString();
            //     $q->where('dob', '>=', $maxAgeDate);
            // }

            // if($request->profession or $request->education_level
            //     or $request->district or $request->marital_status)
            // {
            //     $q->whereHas('personalInfo', function ($query) use ($request)
            //    {
            //         if($request->profession)
            //         {
            //             $query->where('my_profession', $request->profession);
            //         }

            //         if($request->education_level)
            //         {
            //             $query->where('education_level', $request->education_level);
            //         }

            //         if($request->district)
            //         {
            //             $query->where('district', $request->district);
            //         }

            //         if($request->marital_status)
            //         {
            //             $query->where('marital_status', $request->marital_status);
            //         }

            //     });
            // }
        })
        ->orderBy('id', $request->order_by)
        ->limit($request->limit)
        ->get();



        if($request->ajax())
        {
            // return $mails;
            return Response()->json([

                'success' => true,

                'page'=>View('admin.users.ajax.emails',[
                'emails'=>$mails,
                ])->render()

            ]);
        }
    }


    public function sendCvToGivenEmailPost(Request $request)
    {
        $email = $request->email;


        $ids = $request->ids;
        if($ids)
        {
            $ids = array_slice($ids, 0, 20);

            $users = User::withoutGlobalScopes()->whereIn('id', $ids)->get();


            Auth::user()->sendUserCvToEmail($email,$users);

        }




        // foreach($request->ids as $id)
        // {
        //     $u = User::withoutGlobalScopes()->find($id);

        //     if($u)
        //     {
        //         $u->sendUserCvToEmail($email);
        //         // $u->getCvEmailFromUser($user);
        //     }

        // }

            if($request->ajax())
            {
                return Response()->json([

                'success' => true,

                ]);
            }


            return back();


    }
    public function quickSmsDraftSendPost(QuickSmsContactBulk $bulk, Request $request)
    {

        // dd($bulk);
        $validation = Validator::make($request->all(),
        [
            "recipients" => "required",
            // "sender_number" => "required|numeric",
            "message" => "required|string",
            // 'accept'=>'required'

        ]);
 
        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Wrong!');
        }

        if($request->recipients)
        {

            $bulk->contacts()->delete();

            $bulk->sent_from = $request->masking ? $request->sender_number : null;
            $bulk->message = $request->message;



            $rs = trim($request->recipients);
            $rs = rtrim($rs,',');
            $rs = explode(",",$rs);

            foreach($rs as $number)
            {
                $number = bdMobile($number);

                if(strlen($number) == 13)
                {
                    $bulk->status = 'sent'; //temp,draft,sent
                    $bulk->save();

                    $sms = new QuickSmsContact;
                    $sms->quick_sms_contact_bulk_id = $bulk->id;
                    $sms->mobile = $number;
                    $sms->status = 'sent'; //temp,draft,sent
                    $sms->addedby_id = Auth::id();
                    $sms->save();
                }
            }

            if((!$bulk->id) or (!$bulk->contacts->count()))
            {

                return back()->with('error', 'Sorry, There is no contacts.');
            }

                $msg = trim($request->message);
                $msg = urlencode($msg);

            if($request->masking == "on")
            {
                foreach ($rs as $contact) {
                    $to= $contact;

                    $url = smsUrlMasking($to,$msg);

                    $client = new Client();

                    try {
                            $r = $client->request('GET', $url);
                        } catch (\GuzzleHttp\Exception\ConnectException $e) {
                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                        }
                }

            }else{

                foreach ($rs as $contact) {
                    $to= $contact;
                    $url = smsUrl($to,$msg);
                    $client = new Client();
                    try {
                            $r = $client->request('GET', $url);
                        } catch (\GuzzleHttp\Exception\ConnectException $e) {
                        } catch (\GuzzleHttp\Exception\ClientException $e) {
                        }
                }

            }

            return back()->with('success','Your Quick SMS successfully sent.');
 
 





            // $masking = $request->sender_number;
            // $to = $contacts;
            // $username = 'taslimamedia@gmail.com';
            // $pass = '123456';
            // $apiKey = smsApiKey();
            // $msg = trim($request->message);

            // //API URL Non Masking (GET & POST)

            // ##   http://connect.primesoftbd.com/smsapi/non-masking?api_key=$2y$10$PT2OlLaCqLcVhqd1P1kl7ePKWg5axIQXjiuFFfYKtrJc03k8ohYYy&smsType=text&mobileNo=(NUMBER)&smsContent=(Message Content)

            // //API URL Masking (GET & POST)

            // ##  http://connect.primesoftbd.com/smsapi/masking?api_key=$2y$10$PT2OlLaCqLcVhqd1P1kl7ePKWg5axIQXjiuFFfYKtrJc03k8ohYYy&smsType=text&maskingID=(MASKING)&mobileNo=(NUMBER)&smsContent=(Message Content)

            // //Credit Balance API
            // ##  http://connect.primesoftbd.com/api/balance?api_key=$2y$10$PT2OlLaCqLcVhqd1P1kl7ePKWg5axIQXjiuFFfYKtrJc03k8ohYYy

            // //$url = "http://brandsms.mimsms.com/smsapi?api_key={$apiKey}&type=text&contacts={$to}&senderid={$senderid}&msg={$msg}";

            // if($request->masking)
            // {
            //     $url = "http://connect.primesoftbd.com/smsapi/masking?api_key={$apiKey}&smsType=text&maskingID={$masking}&mobileNo={$to}&smsContent={$msg}";
            // }else
            // {
            //     $url = "http://connect.primesoftbd.com/smsapi/non-masking?api_key={$apiKey}&smsType=text&mobileNo={$to}&smsContent={$msg}";
            // }




            // // dd($url);


            //  $client = new Client();
            //  # $response = $client->request('GET', $url);

            //  //https://stackoverflow.com/questions/46005027/handling-client-errors-exceptions-on-guzzlehttp

            // try {
            //         $r = $client->request('GET', $url);


            //     } catch (\GuzzleHttp\Exception\ConnectException $e) {
            //         // This is will catch all connection timeouts
            //         // Handle accordinly
            //     } catch (\GuzzleHttp\Exception\ClientException $e) {
            //         // This will catch all 400 level errors.
            //         // return $e->getResponse()->getStatusCode();
            //     }

            // ### sms api end here (masking & nonmasking seperate) ###

            // return back()->with('success','Your Quick SMS successfully sent.');
        }
    }



    public function mobileNumbersAll(Request $request)
    {
        // dd(1);
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'mobileAndEmail','lsbsm'=>'mobileNumbersAll']);
        $users = User::latest()->groupBy('mobile')->paginate(100);
        return view('admin.mobileNumbersAll', ['users'=>$users]);
    }

    public function emailNumbersAll(Request $request)
    {
        $request->session()->forget(['lsbm','lsbsm']);
        $request->session()->put(['lsbm'=>'mobileAndEmail','lsbsm'=>'emailNumbersAll']);
        $users = User::latest()->groupBy('email')->paginate(100);
        return view('admin.emailNumbersAll', ['users'=>$users]);
    }


    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new UsersImport,request()->file('file'));

        return back();
    }


    public function logs(User $user)
    {

        // dd($user);
        $logs=Log::where('user_id', $user->id)->latest()->get();
        return view('admin.logs', compact('user', 'logs'));
    }


    public function logPost(Request $request, User $user)
    {


        $log = Log::create([
            'user_id' => $user->id,
            'description' => $request->description,
            'addedby_id' =>auth()->user()->id,
        ]);

        return back()->with('success', "Log Added Successfully");

    }


    public function newUser(Request $request)
    {



        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'user', 'lsbsm' => 'newUser']);

        return view('admin.users.newUser');
    }





    public function newUserPost(Request $request)
    {
        // dd($request->mobile);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'user_type' => "offline"
        ]);

        // dd($user->mobile);

        return redirect()->route('users.editprofile', $user->id);
    }


    public function uploadNewCv(Request $request)
    {
        // dd($request->all());


        $user = User::withoutGlobalScopes()->where('id', $request->user)->first();
        if (!$user) {
            abort(404);
        }

        if ($request->hasFile('cv')) {
            $file = $request->cv;
            $ext = $file->getClientOriginalExtension();

            if (
                $ext ==  'jpg' or
                $ext ==  'jpeg' or
                $ext ==  'png' or
                $ext ==  'bmp' or
                $ext ==  'gif' or
                $ext ==  'pdf' or
                $ext ==  'doc' or
                $ext ==  'docx'
            ) {
            } else {
                return back()->with('error', 'Please, upload a pdf or image or word file');
            }

            $imageNewName = $user->id . '_cv_' . str_random(8) . time() . '.' . $ext;

            Storage::disk('upload')
                ->put('users/cv/' . $imageNewName, File::get($file));

            if ($user->file_name) {
                Storage::disk('upload')->delete('users/cv/' . $user->file_name);
            }

            $user->file_name = $imageNewName;
            $user->file_ext = $ext;
            $user->cv_checked = 1;
            $user->save();

            return back()->with('success', 'Cv Successfully Uploaded.');
        }
    }




    public function userCvChecked(Request $request, User $user)
    {

        if ($user->cv_checked) {
            $user->cv_checked = 0;
            $user->save();
        } else {
            $user->cv_checked = 1;
            $user->save();
        }


        if ($request->ajax()) {
            return Response()->json([
                'success' => true
            ]);
        }

        return back();
    }



    public function newTempPassSendPost(Request $request, User $user)
    {


        $newPass = $request->new_password ?: rand(100000, 999999);

        // $user->password_temp = $request->new_password;
        $user->password_temp = $newPass;
        $user->password = Hash::make($newPass);
        $user->editedby_id = Auth::id();
        $user->save();

        if ($user->mobile) {
            if (strlen(bdMobile($user->mobile)) == 13) {
                $user->passwordResetSmsSend();
            }
        }

        return back()->with('success', "New temporary password set for {$user->username}");
    }




    public function upgradeUserForFreePost(Request $request)
    {
        // dd($request->all());


        $validation = Validator::make(
            $request->all(),
            [
                "free_membership_duration" => 'required|numeric',
            ]
        );
        if ($validation->fails()) {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Something went wrong, please try again.');
        }

        $duration = $request->free_membership_duration;

        $user = User::withoutGlobalScopes()->where('id', $request->user)->first();
        if (!$user) {
            abort(404);
        }


        $payment = UserPayment::where('user_id', $user->id)
            ->where('status', 'pending')->first();
        if ($payment) {
            return back()
                ->with('info', "Previous payment order of {$user->username} is pending");
        } else {
            $payment = new UserPayment;
            $payment->status = 'paid';
            $payment->membership_package_id = null;
            $payment->package_title = 'Free Package';
            $payment->package_description = 'Free Packages offered by admin';
            $payment->package_amount = 0;
            $payment->package_currency = 'BDT';
            $payment->package_duration = $duration;
            $payment->paid_amount = 0;
            $payment->paid_currency = 'BDT';
            $payment->payment_method = null;
            $payment->payment_details = 'This membership package is fully free';
            $payment->admin_comment = "Dear {$user->username}, We offered you {$duration} days free membership access. Stay connected and enjoy.";
            $payment->user_id = $user->id;
            $payment->addedby_id = Auth::id();
            $payment->editedby_id = Auth::id();
            $payment->save();

            $expired_at = $user->expired_at;
            if ($expired_at > Carbon::now()) {

                $user->expired_at = Carbon::parse($expired_at)->addDays($duration);

            } else {

                $now = Carbon::now();
                $user->expired_at = Carbon::parse($now)->addDays($duration);
            }

            $user->package = 0;
            $user->save();

            // if (!(env('APP_ENV') == 'local')) {
            //     Mail::send('emails.paymentAcceptedToUser', ['payment' => $payment], function ($message) use ($payment) {
            //         $message->from('info@bridegroombd.com', 'bridegroombd Payment Section');
            //         $message->to($payment->user->email,  '')
            //             ->subject('Payment Processing Completed at ' . url('/'));
            //     });
            // }

            return back()->with('success', 'Free package processing successfully completed.');
        }
    }




    public function userProfilepicChange(Request $request, User $user)
    {
        $validation = Validator::make($request->all(),
            ['profile_picture' => 'required|image|mimes:jpeg,bmp,png,gif,jpg|dimensions:min_width=160,min_height=160'
        ]);
        if($validation->fails())
        {
            if($request->ajax())
            {
              return Response()->json(View('admin.users.ajax.userProfilePic', ['user' => $user])
                ->render());
            }

            return redirect()->back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'image must be at least 160px width and 160px height');
        }

        if($request->hasFile('profile_picture'))
        {
            $cp = $request->file('profile_picture');
            $cw= (int) $request->change_width;
            $ch = (int) $request->change_height;
            $x = $request->off_x > 0 ? (int) $request->off_x : 0;
            $y = $request->off_y > 0 ? (int) $request->off_y : 0;
            $extension = $cp->getClientOriginalExtension();
            $mime = $cp->getClientMimeType();
            $size =$cp->getSize();
            $file = $request->profile_picture;
            $randomFileName =$originalName = date('Ymdhms').'.'.$file->getClientOriginalName();;

            list($originalWidth,$originalHeight) = getimagesize($cp);
            // if($originalWidth == '200' && $originalHeight == '200')
            // {
            //     Storage::disk('upload')
            //     ->put('users/pp/'.$randomFileName, File::get($cp));
            //             //pfi = product feature image
            // }
            // else if($originalWidth == '160' && $originalHeight == '160')
            // {
            //     Storage::disk('upload')
            //     ->put('users/pp/'.$randomFileName, File::get($cp));
            //             //pfi = product feature image
            // }
            // else
            // {

                $image = Image::make($cp)
                ->crop($cw, $ch, $x, $y)
                ->resize(160, 160)
                ->save(public_path().'/storage/users/pp/'.$randomFileName, 90);
                $watermark = Image::make(public_path('/img/vipmm.png'));
                $image->insert($watermark);
                // $image->insert($watermark, 'bottom-right', 10, 10);
                // $image->mask($watermark, true);
                // $image->fill($watermark, 0, 0);
                // $image->save(public_path().'/storage/users/pp/'.$randomFileName, 90);
                $image->save();





                $originalWidth = $image->width();
                $originalHeight = $image->height();
                $image->destroy();


            // }
            UserPicture::where('user_id', $user->id)->where('image_type', "profilepic")->where('autoload', true)->update([
                'autoload'=>false,
                'editedby_id' => Auth::id()
            ]);

        //     $oldRows = $user->userPictures()
        //     ->whereImageType('profilepic')
        //     ->whereAutoload(true)
        //     ->update([
        //         'autoload'=>false,
        //         'editedby_id' => Auth::id()
        //     ]);

        //    return $oldRows;

            $cp = $user->userPictures()
            ->create([]);
            $cp->autoload = true;
            $cp->checked = true;
            $cp->image_type = 'profilepic';
            $cp->image_name = $randomFileName;
            $cp->image_mime = $mime;
            $cp->image_ext = $extension;
            $cp->image_width = $originalWidth;
            $cp->image_height = $originalHeight;
            $cp->image_size = $size;
            $cp->image_alt = env('APP_NAME_BIG');
            $cp->save();

            $user->profile_img = $randomFileName;
            $user->save();



            if($request->ajax())
            {
              return Response()->json(View('admin.partials.userProfilePic', ['user' => $user])
                ->render());
          }
      }
      return back();
    }



    public function IMGstore(Request $request)
    {
        // $folderPath = public_path('upload/');

        // $image_parts = explode(";base64,", $request->image);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        // $image_base64 = base64_decode($image_parts[1]);

        // $imageName = uniqid() . '.png';

        // $imageFullPath = $folderPath.$imageName;

        // file_put_contents($imageFullPath, $image_base64);

        //  $saveFile = new Image;
        //  $saveFile->title = $imageName;
        //  $saveFile->save();

        return response()->json(['success'=>'Crop Image Saved/Uploaded Successfully using jQuery and Ajax In Laravel']);
    }


    public function userSettingValueDelete(UserSettingItem $value)
    {
        $value->delete();
       return back()->with('success', 'Value Deleted Successfully');
    }


    public function makeUserActive(Request $request)
    {
        $user = User::withoutGlobalScopes()->find($request->user);
        if($user)
        {
            if($user->active)
            {
                $user->active = false;
                // $user->deactivateSmsSentToUser();
                // $user->deactivateEmailSentToUser($user);
                $user->inactive_at = Carbon::now();
                $user->editedby_id = Auth::id();
                $user->save();
            }else
            {
                $user->active = true;
                $user->inactive_at = Carbon::now();
                // $user->activateSmsSentToUser();
                // $user->activateEmailSentToUser($user);
                $user->editedby_id = Auth::id();
                $user->save();
            }

        }

        return back()->with('info', "User's activity updated.");
    }
    public function allFreePayments(Request $request)
    {

        // if (!Auth::user()->hasPermission('payment')) {
        //     abort(401);
        // }
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'payments', 'lsbsm' => 'allFreePayments']);
        $payments = UserPayment::where('status', 'paid')->where('paid_amount', 0)->latest()->paginate(40);
        return view('admin.payments.allPaidPayments', [
            'payments' => $payments,
        ]);
    }

    public function mediaAll()
    {
        $mediaAll = Media::latest()->paginate(48);

        return view('admin.media.mediaAll',compact('mediaAll'));
    }



    public function mediaDelete(Request $request, Media $media)
    {

        $f = 'media/image/' . $media->file_name;
        if (Storage::disk('upload')->exists($f)) {
            Storage::disk('upload')->delete($f);
        }
        $media->delete();
        return back()->with('info','Media successfully deleted.');

    }

    public function mediaUploadPost(Request $request)
    {
        // dd($request->all());
        $validation = Validator::make($request->all(),
        [ 
            'files.*' => 'image'
        ]);

        if($validation->fails())
        {
            return back()
            ->withErrors($validation)
            ->withInput()
            ->with('error', 'Something Went Wrong!');
        }

        if($request->hasFile('files'))
            {
                foreach($request->file('files') as $file)
                {
                    $originalName = $file->getClientOriginalName();
                    $ext = strtolower($file->getClientOriginalExtension());
                    $mime = $file->getClientMimeType();
                    $size =$file->getSize();
                    $fileNewName = Str::random(4).date('ymds').'.'.$ext;
                    // $fileNewName = str_random(6).time().'.'.$ext;
                    // $fileNewName = Auth::id().'_'.date('ymdhis').'_'.rand(11,99).'.'.$ext;
                    list($width,$height) = getimagesize($file);                    

                    Storage::disk('upload')
                    ->put('media/image/'.$fileNewName, File::get($file));

                    $file_new_url = 'storage/media/image/'.$fileNewName;

                    $media = new Media;                    
                    $media->file_name = $fileNewName;
                    $media->file_original_name = $originalName;
                    $media->file_mime = $mime;
                    $media->file_ext = $ext;
                    $media->file_size = $size;
                    
                    $media->width = $width;
                    $media->height = $height;
                    $media->file_url = $file_new_url;
                    $media->addedby_id = Auth::id();
                    if($mime == 'image/gif' or $mime == 'image/png' or $mime == 'image/jpeg' or $mime == 'image/bmp')
                    {
                        $media->file_type = 'image';
                    }
                    //image/gif, image/png, image/jpeg, image/bmp, image/webp

                    $media->save();

                }
            }
        

        return back();
    }

    public function getMediasAjax()
    {
        $paginate = 20;
        $medias = Media::latest()->paginate($paginate);
        $html = view('admin.media.mediaAjax', ['medias' => $medias]);
        return response()->json( $html->render());
    }

}
