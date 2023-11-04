<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\District;
use App\Models\Division;
use App\Models\MembershipPackage;
use App\Models\PertnerPreference;
use App\Models\UserPayment;
use App\Models\User;
use App\Models\UserProposal;
use App\Models\Gallery;
use Illuminate\Support\Facades\Crypt;
use App\Models\Religion;
use GuzzleHttp\Client;
// use App\Models\Cast;
use App\Models\Report;
use App\Models\Upazila;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;
use App\Models\UserMessage;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;
use HaIlluminate\Support\Facades\Hash;
use Cache;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;


use Mail;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserController extends Controller
{
    public function allsearch(Request $request)
    {
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'allsearch',]);
        return view('search.index');
    }
    public function allsearchresult(Request $request){

    $me = Auth::user();
    $users = User::where('active', 1)->where(function ($q) use ($request) {
         $q->where('gender', Auth::user()->oltGender());
        if( $request->religion)
            {
                $q->where('religion', $request->religion);
            }

            if( $request->education_level)
            {
                if($request->education_level != "Any")
                {
                    $q->where('education_level', $request->education_level);
                }


            }
            if( $request->profession)
            {

                if($request->profession != "Any")
              {


                $q->where('profession', $request->profession);
              }

            }
            if( $request->country)
            {

            if($request->country != "Any")
              {
                $q->where('country', $request->country);
                $q->orWhere('permanent_country', $request->country);
                $q->orWhere('present_country', $request->country);
              }

            }

            if( $request->area)
            {
            if($request->area != "Any")
            {
                $q->where('parmanent_district', $request->area);
                $q->orWhere('present_district', $request->area);
            }

            }

    })
    ->latest()
    ->paginate(30);

    return view('user.searchResult', [

        'users' => $users,
        'me' => $me
    ]);
    }
    public function getSearch(Request $request,$slug)
    {
        $districts=District::get();
        $religions=Religion::get();
        return view('search.allsearchform',compact('slug','districts','religions'));
    }


    public function packages()
    {
        $packages = MembershipPackage::orderBy('package_amount', 'DESC')->get();

        return view('user.packages', compact('packages'));
    }

    public function edit($id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }

        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        // $userRole = $user->roles->pluck('name','name')->all();

        return view('admin.useredit', compact('user', 'roles'));
    }

    public function editprofile($id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        $user  = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $religions=Religion::get();
        $casts=Cast::where('religion_id', $user->religion)->get();
        $divisions=Division::get();
        $permanent_districts=District::where('division_id', $user->parmanent_division)->get();
        $permanent_thanas=Upazila::where('district_id', $user->parmanent_district)->get();
        $present_districts=District::where('division_id', $user->present_division)->get();
        $present_thanas=Upazila::where('district_id', $user->present_district)->get();
        $packages = MembershipPackage::all();
        // $userRole = $user->roles->pluck('name','name')->all();

        $encrypted =$user->password;



        return view('admin.usereditprofile', compact('user', 'roles', 'religions', 'casts', 'divisions', 'permanent_districts', 'permanent_thanas', 'present_districts', 'present_thanas','packages'));
    }


    public function update(Request $request, $id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'role' => 'required'
        ]);



        $user = user::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => FacadesHash::make($request->password),
            /*'updated_by'=>auth()->user()->id*/
        ]);



        $user = user::find($id)->syncRoles($request->input('role'));
        // dd($user);

        return back();
        // return redirect()->route('users.index')
        //                 ->with('success','User updated successfully');
    }

    public function show($id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        $user = User::find($id);

        // dd($user->getAllPermissions());

        return view('admin.usershow', compact('user'));
    }


    public function messageDashboard(Request $request)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        if (!Auth::user()->isPaidAndValidate()) {
            return redirect('/packages');
        }
        $request->session()->forget(['lsbm', 'lsbsm']);
        $request->session()->put(['lsbm' => 'dashboard', 'lsbsm' => 'messageDashboard']);

        if ($request->userto) {
            $user = User::where('id', $request->userto)->where('id', '<>', Auth::id())->first();
            $open = 0;
        } else {
            $user = Auth::user()->latestMsgUser();
            $open = 1;
        }

        return view('user.messageDashboard', ['userto' => $user, 'open' => $open]);
    }


    public function messageDashboardPost(Request $request)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        $user = User::where('id', $request->userto)->where('id', '<>', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        UserMessage::where('last', 1)
            ->where(function ($f) use ($user) {

                $f->where([
                    ['userto_id', '=', $user->id],
                    ['userfrom_id', '=',  Auth::id()]
                ]);

                $f->orWhere([
                    ['userto_id', '=', Auth::id()],
                    ['userfrom_id', '=',  $user->id]
                ]);
            })->update(['last' => 0]);

        $m = new UserMessage;
        $m->userfrom_id = Auth::id();
        $m->userto_id = $user->id;
        $m->message = $request->message;
        $m->save();

        // $user->sendMsgNotifyEmailToUser();

        return back()->with('success', 'Your message successfully sent.');
    }


    public function profilePost(Request $request, $id)
    {


        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }

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

        if(strcmp($profile->mobile,$request->mobile) == 1){
            $profile->mobile_verified = Null;
        }
        $profile->mobile = $request->mobile;

        // $profile->gender = $request->gender;

        $profile->religious_view = $request->religious_view;
        // $profile->mobile = $request->mobile;
        // $profile->active = false;
        $profile->active = true;
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
        //profile Public
        if($request->profile_public == "on")
        {
            $profile->profile_public = true;
        }else{
            $profile->profile_public = false;
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
        // if ($request->profile_img) {
        //     $file = $request->profile_img;

        //     $originalName = $file->getClientOriginalName();
        //     Storage::disk('upload')->put('profile/' . $originalName, File::get($file));
        //     $profile->profile_img = $originalName;
        // }

        $profile->final_check = false;
        // $profile->user_id =  $me->id;
        $profile->save();



        if ($request->profile_img) {
            $file = $request->profile_img;
            // date('Ymdhms').'.'.$product->getClientOriginalName();
            $originalName =strtolower(date('Ymdhms').'.'.$file->getClientOriginalName());
            Storage::disk('upload')->put('users/pp/' . $originalName, File::get($file));
            // Storage::disk('upload')->put('profile/' . $originalName, File::get($file));



            $cp = $request->user()->userPictures()
            ->create([]);
        $cp->autoload = true;
        $cp->image_type = 'profilepic';
        $cp->image_name = $originalName;
        $cp->image_alt = env('APP_NAME_BIG');
                $cp->save();
        }

        return back()->with('success', 'Your Profile updated successfully.');
    }


    public function profilePost2(Request $request, $id)
    {


        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // dd($request->all());

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
        // $profile->religious_view = $request->religious_view;
        // $profile->name = $request->name;
        $profile->profile_created_by = $request->profile_created_by;
        $profile->dob = $request->dob;
        $profile->gender = $request->gender;
        $profile->religion = $request->religion;
        $profile->caste = $request->caste;
        $profile->marital_status = $request->marital_status;
        $profile->children_have = $request->children_have;

        // $profile->skin_color = $request->skin_color;

        // $profile->height = $request->height

        // $profile->body_type = $request->body_type;
        // $profile->disability = $request->disability;
        // $profile->blood_group = $request->blood_group;

        // $profile->mobile = $request->full_mobile;
        $profile->looking_for = $looking_for;
        // $profile->family_value = $request->family_value;
        // $profile->mother_tongue = $request->mother_tongue;
        // $profile->country = $request->country;
        // $profile->grewup_in = $request->grewup_in;
        // $profile->personal_value = $request->personal_value;
        // if ($request->can_speak) {
        //     $profile->can_speak = implode(', ', $request->can_speak);
        // } else {
        //     $profile->can_speak= null;
        // }
        // $profile->education_level = $request->education_level;
        // $profile->university = $request->university;

        // $profile->major_subject = $request->major_subject;
        // $profile->workplace = $request->workplace;
        // $profile->designation = $request->designation;

        // if ($request->music) {
        //     $profile->music = implode(', ', $request->music);
        // } else {
        //     $profile->music = null;
        // }

        // if ($request->cooking) {
        //     $profile->cooking = implode(', ', $request->cooking);
        // } else {
        //     $profile->cooking = null;
        // }

        // if ($request->dress) {
        //     $profile->dress = implode(', ', $request->dress);
        // } else {
        //     $profile->dress = null;
        // }

        // if ($request->book) {
        //     $profile->book = implode(', ', $request->book);
        // } else {
        //     $profile->book= null;
        // }

        // if ($request->movie) {
        //     $profile->movie = implode(', ', $request->movie);
        // } else {
        //     $profile->movie = null;
        // }
        //  $profile->drink = $request->drink;
        // $profile->smoke = $request->smoke;
        // $profile->diet = $request->diet;
        // $profile->family_type = $request->family_type;
        // $profile->family_status = $request->family_status;
        // $profile->father_prof = $request->father_prof;
        // $profile->mother_prof = $request->mother_prof;
        // $profile->no_bro = $request->no_bro;
        // $profile->no_bro_m = $request->no_bro_m;
        // $profile->no_sis = $request->no_sis;
        // $profile->no_sis_m = $request->no_sis_m;
        // $profile->call_time = $request->call_time;
        // $profile->contact_person = $request->contact_person;
        // $profile->relation_with_contact = $request->relation_with_contact;
        // $profile->permanent_country = $request->permanent_country;
        // $profile->parmanent_division = $request->parmanent_division;
        // $profile->parmanent_district = $request->parmanent_district;
        // $profile->parmanent_thana = $request->parmanent_thana;
        // $profile->present_country = $request->present_country;
        // $profile->present_division = $request->present_division;
        // $profile->present_district = $request->present_district;
        // $profile->present_thana = $request->present_thana;
        // $profile->present_po = $request->present_po;
        // $profile->active = false;
        // if ($request->profile_img) {
        //     $file = $request->profile_img;
        //     $originalName = $file->getClientOriginalName();
        //     Storage::disk('upload')->put('profile/' . $originalName, File::get($file));
        //     $profile->profile_img = $originalName;
        // }
        $profile->final_check = false;
        $profile->save();
        //sendsms
        // $profile->registerSmsSend();

        //endsms

        // dd($profile->mobile);
        return redirect()->route('user.profile')->with('message', 'Account created successfully');
    }



    public function physicalPost(Request $request, $id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // dd($request->all());

        $me=auth()->user();

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
        // $profile->religious_view = $request->religious_view;
        // $profile->name = $request->name;
        // $profile->profile_created_by = $request->profile_created_by;
        // $profile->dob = $request->dob;
        // $profile->gender = $request->gender;
        // $profile->religion = $request->religion;
        // $profile->caste = $request->caste;
        // $profile->marital_status = $request->marital_status;
        // $profile->children_have = $request->children_have;

        $profile->skin_color = $request->skin_color;

        $profile->height = $request->height;

        $profile->body_type = $request->body_type;
        $profile->disability = $request->disability;
        $profile->blood_group = $request->blood_group;

        // $profile->mobile = $request->mobile;
        // $profile->looking_for = $looking_for;
        // $profile->family_value = $request->family_value;
        // $profile->mother_tongue = $request->mother_tongue;
        // $profile->country = $request->country;
        // $profile->grewup_in = $request->grewup_in;
        // $profile->personal_value = $request->personal_value;
        // if ($request->can_speak) {
        //     $profile->can_speak = implode(', ', $request->can_speak);
        // } else {
        //     $profile->can_speak= null;
        // }
        $profile->education_level = $request->education_level;
        $profile->university = $request->university;

        $profile->major_subject = $request->major_subject;
        $profile->workplace = $request->workplace;
        $profile->designation = $request->designation;

        // if ($request->music) {
        //     $profile->music = implode(', ', $request->music);
        // } else {
        //     $profile->music = null;
        // }

        // if ($request->cooking) {
        //     $profile->cooking = implode(', ', $request->cooking);
        // } else {
        //     $profile->cooking = null;
        // }

        // if ($request->dress) {
        //     $profile->dress = implode(', ', $request->dress);
        // } else {
        //     $profile->dress = null;
        // }

        // if ($request->book) {
        //     $profile->book = implode(', ', $request->book);
        // } else {
        //     $profile->book= null;
        // }

        // if ($request->movie) {
        //     $profile->movie = implode(', ', $request->movie);
        // } else {
        //     $profile->movie = null;
        // }
        //  $profile->drink = $request->drink;
        // $profile->smoke = $request->smoke;
        // $profile->diet = $request->diet;
        // $profile->family_type = $request->family_type;
        // $profile->family_status = $request->family_status;
        // $profile->father_prof = $request->father_prof;
        // $profile->mother_prof = $request->mother_prof;
        // $profile->no_bro = $request->no_bro;
        // $profile->no_bro_m = $request->no_bro_m;
        // $profile->no_sis = $request->no_sis;
        // $profile->no_sis_m = $request->no_sis_m;
        // $profile->call_time = $request->call_time;
        // $profile->contact_person = $request->contact_person;
        // $profile->relation_with_contact = $request->relation_with_contact;
        // $profile->permanent_country = $request->permanent_country;
        // $profile->parmanent_division = $request->parmanent_division;
        // $profile->parmanent_district = $request->parmanent_district;
        // $profile->parmanent_thana = $request->parmanent_thana;
        // $profile->present_country = $request->present_country;
        // $profile->present_division = $request->present_division;
        // $profile->present_district = $request->present_district;
        // $profile->present_thana = $request->present_thana;
        // $profile->present_po = $request->present_po;
        // $profile->active = false;
        // if ($request->profile_img) {
        //     $file = $request->profile_img;
        //     $originalName = $file->getClientOriginalName();
        //     Storage::disk('upload')->put('profile/' . $originalName, File::get($file));
        //     $profile->profile_img = $originalName;
        // }
        $profile->final_check = false;
        $profile->save();
        return redirect()->route('user.profile')->with('message', 'Account created successfully');
    }


    public function socialCulture(Request $request, $id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // dd($request->all());

        $me=auth()->user();

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
        // $profile->religious_view = $request->religious_view;
        // $profile->name = $request->name;
        // $profile->profile_created_by = $request->profile_created_by;
        // $profile->dob = $request->dob;
        // $profile->gender = $request->gender;
        // $profile->religion = $request->religion;
        // $profile->caste = $request->caste;
        // $profile->marital_status = $request->marital_status;
        // $profile->children_have = $request->children_have;

        // $profile->skin_color = $request->skin_color;

        // $profile->height = $request->height;

        // $profile->body_type = $request->body_type;
        // $profile->disability = $request->disability;
        // $profile->blood_group = $request->blood_group;

        // $profile->mobile = $request->mobile;
        // $profile->looking_for = $looking_for;
        // $profile->family_value = $request->family_value;
        $profile->mother_tongue = $request->mother_tongue;
        $profile->country = $request->country;
        $profile->grewup_in = $request->grewup_in;
        $profile->personal_value = $request->personal_value;
        if ($request->can_speak) {
            $profile->can_speak = implode(', ', $request->can_speak);
        } else {
            $profile->can_speak= null;
        }
        // $profile->education_level = $request->education_level;
        // $profile->university = $request->university;

        // $profile->major_subject = $request->major_subject;
        // $profile->workplace = $request->workplace;
        // $profile->designation = $request->designation;

        if ($request->music) {
            $profile->music = implode(', ', $request->music);
        } else {
            $profile->music = null;
        }

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
        //  $profile->drink = $request->drink;
        // $profile->smoke = $request->smoke;
        // $profile->diet = $request->diet;
        // $profile->family_type = $request->family_type;
        // $profile->family_status = $request->family_status;
        // $profile->father_prof = $request->father_prof;
        // $profile->mother_prof = $request->mother_prof;
        // $profile->no_bro = $request->no_bro;
        // $profile->no_bro_m = $request->no_bro_m;
        // $profile->no_sis = $request->no_sis;
        // $profile->no_sis_m = $request->no_sis_m;
        // $profile->call_time = $request->call_time;
        // $profile->contact_person = $request->contact_person;
        // $profile->relation_with_contact = $request->relation_with_contact;
        // $profile->permanent_country = $request->permanent_country;
        // $profile->parmanent_division = $request->parmanent_division;
        // $profile->parmanent_district = $request->parmanent_district;
        // $profile->parmanent_thana = $request->parmanent_thana;
        // $profile->present_country = $request->present_country;
        // $profile->present_division = $request->present_division;
        // $profile->present_district = $request->present_district;
        // $profile->present_thana = $request->present_thana;
        // $profile->present_po = $request->present_po;
        // $profile->active = false;
        // if ($request->profile_img) {
        //     $file = $request->profile_img;
        //     $originalName = $file->getClientOriginalName();
        //     Storage::disk('upload')->put('profile/' . $originalName, File::get($file));
        //     $profile->profile_img = $originalName;
        // }
        $profile->final_check = false;
        $profile->save();

        // dd($profile);
        return redirect()->route('user.profile')->with('message', 'Account created successfully');
    }



    public function familyDetails(Request $request, $id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // dd($request->all());

        $me=auth()->user();

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
        // $profile->religious_view = $request->religious_view;
        // $profile->name = $request->name;
        // $profile->profile_created_by = $request->profile_created_by;
        // $profile->dob = $request->dob;
        // $profile->gender = $request->gender;
        // $profile->religion = $request->religion;
        // $profile->caste = $request->caste;
        // $profile->marital_status = $request->marital_status;
        // $profile->children_have = $request->children_have;

        // $profile->skin_color = $request->skin_color;

        // $profile->height = $request->height;

        // $profile->body_type = $request->body_type;
        // $profile->disability = $request->disability;
        // $profile->blood_group = $request->blood_group;

        // $profile->mobile = $request->mobile;
        // $profile->looking_for = $looking_for;
        $profile->family_value = $request->family_value;
        // $profile->mother_tongue = $request->mother_tongue;
        // $profile->country = $request->country;
        // $profile->grewup_in = $request->grewup_in;
        // $profile->personal_value = $request->personal_value;
        // if ($request->can_speak) {
        //     $profile->can_speak = implode(', ', $request->can_speak);
        // } else {
        //     $profile->can_speak= null;
        // }
        // $profile->education_level = $request->education_level;
        // $profile->university = $request->university;

        // $profile->major_subject = $request->major_subject;
        // $profile->workplace = $request->workplace;
        // $profile->designation = $request->designation;

        // if ($request->music) {
        //     $profile->music = implode(', ', $request->music);
        // } else {
        //     $profile->music = null;
        // }

        // if ($request->cooking) {
        //     $profile->cooking = implode(', ', $request->cooking);
        // } else {
        //     $profile->cooking = null;
        // }

        // if ($request->dress) {
        //     $profile->dress = implode(', ', $request->dress);
        // } else {
        //     $profile->dress = null;
        // }

        // if ($request->book) {
        //     $profile->book = implode(', ', $request->book);
        // } else {
        //     $profile->book= null;
        // }

        // if ($request->movie) {
        //     $profile->movie = implode(', ', $request->movie);
        // } else {
        //     $profile->movie = null;
        // }
        //  $profile->drink = $request->drink;
        // $profile->smoke = $request->smoke;
        // $profile->diet = $request->diet;
        $profile->family_type = $request->family_type;
        $profile->family_status = $request->family_status;
        $profile->father_prof = $request->father_prof;
        $profile->mother_prof = $request->mother_prof;
        $profile->no_bro = $request->no_bro;
        $profile->no_bro_m = $request->no_bro_m;
        $profile->no_sis = $request->no_sis;
        $profile->no_sis_m = $request->no_sis_m;
        // $profile->call_time = $request->call_time;
        // $profile->contact_person = $request->contact_person;
        // $profile->relation_with_contact = $request->relation_with_contact;
        // $profile->permanent_country = $request->permanent_country;
        // $profile->parmanent_division = $request->parmanent_division;
        // $profile->parmanent_district = $request->parmanent_district;
        // $profile->parmanent_thana = $request->parmanent_thana;
        // $profile->present_country = $request->present_country;
        // $profile->present_division = $request->present_division;
        // $profile->present_district = $request->present_district;
        // $profile->present_thana = $request->present_thana;
        // $profile->present_po = $request->present_po;
        // $profile->active = false;
        // if ($request->profile_img) {
        //     $file = $request->profile_img;
        //     $originalName = $file->getClientOriginalName();
        //     Storage::disk('upload')->put('profile/' . $originalName, File::get($file));
        //     $profile->profile_img = $originalName;
        // }
        $profile->final_check = false;
        $profile->save();

        // dd($profile);
        return redirect()->route('user.profile')->with('message', 'Account created successfully');
    }




    public function contactInfo(Request $request, $id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // dd($request->all());

        $me=auth()->user();

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
        // $profile->religious_view = $request->religious_view;
        // $profile->name = $request->name;
        // $profile->profile_created_by = $request->profile_created_by;
        // $profile->dob = $request->dob;
        // $profile->gender = $request->gender;
        // $profile->religion = $request->religion;
        // $profile->caste = $request->caste;
        // $profile->marital_status = $request->marital_status;
        // $profile->children_have = $request->children_have;

        // $profile->skin_color = $request->skin_color;

        // $profile->height = $request->height;

        // $profile->body_type = $request->body_type;
        // $profile->disability = $request->disability;
        // $profile->blood_group = $request->blood_group;

        // $profile->mobile = $request->mobile;
        // $profile->looking_for = $looking_for;
        // $profile->family_value = $request->family_value;
        // $profile->mother_tongue = $request->mother_tongue;
        // $profile->country = $request->country;
        // $profile->grewup_in = $request->grewup_in;
        // $profile->personal_value = $request->personal_value;
        // if ($request->can_speak) {
        //     $profile->can_speak = implode(', ', $request->can_speak);
        // } else {
        //     $profile->can_speak= null;
        // }
        // $profile->education_level = $request->education_level;
        // $profile->university = $request->university;

        // $profile->major_subject = $request->major_subject;
        // $profile->workplace = $request->workplace;
        // $profile->designation = $request->designation;

        // if ($request->music) {
        //     $profile->music = implode(', ', $request->music);
        // } else {
        //     $profile->music = null;
        // }

        // if ($request->cooking) {
        //     $profile->cooking = implode(', ', $request->cooking);
        // } else {
        //     $profile->cooking = null;
        // }

        // if ($request->dress) {
        //     $profile->dress = implode(', ', $request->dress);
        // } else {
        //     $profile->dress = null;
        // }

        // if ($request->book) {
        //     $profile->book = implode(', ', $request->book);
        // } else {
        //     $profile->book= null;
        // }

        // if ($request->movie) {
        //     $profile->movie = implode(', ', $request->movie);
        // } else {
        //     $profile->movie = null;
        // }
        //  $profile->drink = $request->drink;
        // $profile->smoke = $request->smoke;
        // $profile->diet = $request->diet;
        // $profile->family_type = $request->family_type;
        // $profile->family_status = $request->family_status;
        // $profile->father_prof = $request->father_prof;
        // $profile->mother_prof = $request->mother_prof;
        // $profile->no_bro = $request->no_bro;
        // $profile->no_bro_m = $request->no_bro_m;
        // $profile->no_sis = $request->no_sis;
        // $profile->no_sis_m = $request->no_sis_m;
        $profile->call_time = $request->call_time;
        $profile->gradient_mobile = $request->gradient_mobile;

        $profile->contact_person = $request->contact_person;
        $profile->relation_with_contact = $request->relation_with_contact;
        $profile->permanent_country = $request->permanent_country;
        $profile->parmanent_division = $request->parmanent_division;
        $profile->parmanent_district = $request->parmanent_district;
        $profile->parmanent_thana = $request->parmanent_thana;
        $profile->present_country = $request->present_country;
        $profile->present_division = $request->present_division;
        $profile->present_district = $request->present_district;
        $profile->present_thana = $request->present_thana;
        $profile->present_po = $request->present_po;
        // $profile->active = false;
        // if ($request->profile_img) {
        //     $file = $request->profile_img;
        //     $originalName = $file->getClientOriginalName();
        //     Storage::disk('upload')->put('profile/' . $originalName, File::get($file));
        //     $profile->profile_img = $originalName;
        // }
        $profile->final_check = false;
        $profile->save();

        // dd($profile);
        return redirect()->route('user.profile')->with('message', 'Account created successfully');
    }
    public function lifestyleInfo2(Request $request, $id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // dd($request->all());

        $me=auth()->user();

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
        $profile->religious_view = $request->religious_view;
        // $profile->name = $request->name;
        // $profile->profile_created_by = $request->profile_created_by;
        // $profile->dob = $request->dob;
        // $profile->gender = $request->gender;
        // $profile->religion = $request->religion;
        // $profile->caste = $request->caste;
        // $profile->marital_status = $request->marital_status;
        // $profile->children_have = $request->children_have;

        // $profile->skin_color = $request->skin_color;

        // $profile->height = $request->height;

        // $profile->body_type = $request->body_type;
        // $profile->disability = $request->disability;
        // $profile->blood_group = $request->blood_group;

        // $profile->mobile = $request->mobile;
        // $profile->looking_for = $looking_for;
        // $profile->family_value = $request->family_value;
        // $profile->mother_tongue = $request->mother_tongue;
        // $profile->country = $request->country;
        // $profile->grewup_in = $request->grewup_in;
        // $profile->personal_value = $request->personal_value;
        // if ($request->can_speak) {
        //     $profile->can_speak = implode(', ', $request->can_speak);
        // } else {
        //     $profile->can_speak= null;
        // }
        // $profile->education_level = $request->education_level;
        // $profile->university = $request->university;

        // $profile->major_subject = $request->major_subject;
        // $profile->workplace = $request->workplace;
        // $profile->designation = $request->designation;

        // if ($request->music) {
        //     $profile->music = implode(', ', $request->music);
        // } else {
        //     $profile->music = null;
        // }

        // if ($request->cooking) {
        //     $profile->cooking = implode(', ', $request->cooking);
        // } else {
        //     $profile->cooking = null;
        // }

        // if ($request->dress) {
        //     $profile->dress = implode(', ', $request->dress);
        // } else {
        //     $profile->dress = null;
        // }

        // if ($request->book) {
        //     $profile->book = implode(', ', $request->book);
        // } else {
        //     $profile->book= null;
        // }

        // if ($request->movie) {
        //     $profile->movie = implode(', ', $request->movie);
        // } else {
        //     $profile->movie = null;
        // }
         $profile->drink = $request->drink;
        $profile->smoke = $request->smoke;
        $profile->diet = $request->diet;
        // $profile->family_type = $request->family_type;
        // $profile->family_status = $request->family_status;
        // $profile->father_prof = $request->father_prof;
        // $profile->mother_prof = $request->mother_prof;
        // $profile->no_bro = $request->no_bro;
        // $profile->no_bro_m = $request->no_bro_m;
        // $profile->no_sis = $request->no_sis;
        // $profile->no_sis_m = $request->no_sis_m;
        // $profile->call_time = $request->call_time;
        // $profile->contact_person = $request->contact_person;
        // $profile->relation_with_contact = $request->relation_with_contact;
        // $profile->permanent_country = $request->permanent_country;
        // $profile->parmanent_division = $request->parmanent_division;
        // $profile->parmanent_district = $request->parmanent_district;
        // $profile->parmanent_thana = $request->parmanent_thana;
        // $profile->present_country = $request->present_country;
        // $profile->present_division = $request->present_division;
        // $profile->present_district = $request->present_district;
        // $profile->present_thana = $request->present_thana;
        // $profile->present_po = $request->present_po;
        // $profile->active = false;
        // if ($request->profile_img) {
        //     $file = $request->profile_img;
        //     $originalName = $file->getClientOriginalName();
        //     Storage::disk('upload')->put('profile/' . $originalName, File::get($file));
        //     $profile->profile_img = $originalName;
        // }
        $profile->final_check = false;
        $profile->save();

        // dd($profile);
        return redirect()->route('user.profile')->with('message', 'Account created successfully');
    }




    public function uploadPp2(Request $request, $id)
    {

        $validation = Validator::make(
            $request->all(),
            [
                // 'profile_picture' => 'required|image|mimes:jpeg,bmp,png,gif|dimensions:min_width=160,min_height=160'
                // ['profile_picture' => 'required|image|mimes:jpeg,bmp,png,gif|dimensions:min_width=160,min_height=160,max_width=2000,max_height=2000'
            ]
        );
        if ($validation->fails()) {
            return redirect()->back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', 'Image Size: minimum 160px');
        }


        // dd(5);
        if ($request->hasFile('profile_img')) {

            $cp = $request->file('profile_img');

            $extension = strtolower($cp->getClientOriginalExtension());
            $mime = $cp->getClientMimeType();
            $size = $cp->getSize();

            // $randomFileName = $request->user()->id . '_pp_' . date('Y_m_d_his') . '_' . rand(11111111, 99999999) . '.' . $extension;
            $randomFileName = "bridegroombd" . "-" . profile_slug($request->user()->name) . "_" . $request->user()->id . rand(1111, 9999) . date('his') . '.' . $extension;
            list($originalWidth, $originalHeight) = getimagesize($cp);

            $image = Image::make($cp)
                // ->crop($cw, $ch, $x, $y)
                // ->resize(160, 160)
                ->save(public_path() . '/storage/users/pp/' . $randomFileName, 90);
            // $watermark = Image::make(public_path('/img/tmm5.png'));
            // $image->insert($watermark);
            // $image->save();
            $originalWidth = $image->width();
            $originalHeight = $image->height();
            $image->destroy();
            // }

            // dd($request->all(), 1);
            $cp = $request->user()->userPictures()
                ->create([]);
            $cp->autoload = true;
            $cp->image_type = 'profilepic';
            $cp->image_name = $randomFileName;
            $cp->image_mime = $mime;
            $cp->image_ext = $extension;
            $cp->image_width = $originalWidth;
            $cp->image_height = $originalHeight;
            $cp->image_size = $size;
            $cp->image_alt = env('APP_NAME_BIG');

            // if(servTru())
            // { $cp->save(); } else{}


            $cp->save();





        }
        return redirect()->route('user.profile')->with('message', 'Account created successfully');
    }


    public function uploadPp(Request $request, $id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // dd($request->all());

        $me=auth()->user();


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
        $cp = $request->user()->userPictures()
        ->create([]);

        if ($request->profile_img) {
            $file = $request->profile_img;
            // date('Ymdhms').'.'.$product->getClientOriginalName();
            $originalName = strtolower(date('Ymdhms').'.'.$file->getClientOriginalName());
            Storage::disk('upload')->put('users/pp/' . $originalName, File::get($file));
            $cp->image_type = 'profilepic';
            $cp->image_name = $originalName;
            $cp->image_alt = env('APP_NAME_BIG');
        }
        $cp->autoload = true;
        $cp->save();
    return redirect()->route('user.profile')->with('message', 'Account created successfully');
    }







    public function pertnerPost(Request $request)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }

        $me = Auth::user();
        $pertner = $me->pertnerPreference;

        if (!$pertner) {
            $pertner = new PertnerPreference();
            $pertner->user_id = $me->id;
        }
        $pertner->min_age = $request->age_min;
        $pertner->max_age = $request->age_max;
        $pertner->min_height = $request->height_min;
        $pertner->max_height = $request->height_max;
        $pertner->religion = $request->religion;
        $pertner->children = $request->children;
        $pertner->marital_status = $request->marital_status;
        if ( $request->study) {
           $pertner->study = implode(', ',  $request->study);
        } else {
           $pertner->study = null;
        }

        if ( $request->profession) {
            $pertner->profession = implode(', ',  $request->profession);
         } else {
            $pertner->profession = null;
         }

         if ( $request->skin_color) {
            $pertner->skin_color = implode(', ',  $request->skin_color);
         } else {
            $pertner->skin_color = null;
         }


        $pertner->physical_disability = $request->physical_disability;

        $pertner->save();
        return redirect("/user/profile")->with('success', 'Pertner Preference Added successfully');
    }


    public function profileUpdate(Request $request, $id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        //   dd($request->all());
        // dd($file_name);
        // dd($id);

        if ($request->gender == "Male") {
            $looking_for = "Bride";
        }
        if ($request->gender == "Female") {
            $looking_for = "Groom";
        }
        $profile  = User::find($id);

$me=auth()->user();
        if (!$profile) {
            $profile = new User;
            $profile->user_id = $me->id;
            $profile->addedby_id = $me->id;
        }
        $profile->name = $request->name;
        $profile->profile_created_by = $request->profile_created_by;
        $profile->dob = $request->dob;
        $profile->religion = $request->religion;
        $profile->caste = $request->caste;
        $profile->gender = $request->gender;

        $profile->looking_for = $looking_for;

        $profile->mobile = $request->mobile;
        $profile->active = false;
        $profile->guardian_mobile = $request->guardian_mobile;
        $profile->country = $request->country;

        if ($request->profile_img) {
            $file = $request->profile_img;
            // Storage::disk('upload')->delete('favicon/' . $post->favicon);

            $originalName = strtolower(date('Ymdhms').'.'.$file->getClientOriginalName());
            Storage::disk('upload')->put('profile/' . $originalName, File::get($file));
            $profile->profile_img = $originalName;
        }



        if ($request->final_check) {
            $profile->final_check = true;
        } else {
            $profile->final_check = false;
        }

        $profile->editedby_id = auth()->user()->id;
        // $profile->user_id =  $me->id;
        $profile->save();
        return back()->with('success', 'Account Information Updated successfully');
    }

    public function updateprofile(Request $request)
    {
        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'others', 'lsbsm' => 'update_profile']);
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }


        if (!$request->id) {
            $user = User::where('id', auth()->user()->id)->first();
        } else {
            $user = User::where('id', $request->id)->first();
        }
        $religions=Religion::get();
        $casts=Cast::where('religion_id', $user->religion)->get();
        $divisions=Division::get();
        $permanent_districts=District::where('division_id', $user->parmanent_division)->get();
        $permanent_thanas=Upazila::where('district_id', $user->parmanent_district)->get();
        $present_districts=District::where('division_id', $user->present_division)->get();
        $present_thanas=Upazila::where('district_id', $user->present_district)->get();
        // dd($user->permanent_district, );
        return view('user.updateProfile2', compact('user','religions', 'casts', 'divisions', 'permanent_districts', 'permanent_thanas', 'present_districts', 'present_thanas'));
    }

    public function profile(Request $request)
    {

        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'profile', 'lsbsm' => 'profile']);
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }

        $user = auth()->user();


        if (is_null($user->name) || is_null($user->gender) || is_null($user->religion)) {

            return redirect('/user/incomplete-profile');
        }


        if (is_null($user->designation)  || is_null($user->blood_group)) {
            return redirect('/user/incomplete-profile/physical-attribute');
        }


        // if (is_null($user->mother_tongue) || is_null($user->grewup_in)) {
        //     return redirect('/user/social/culture');
        // }


        if (is_null($user->family_type) || is_null($user->family_status) || is_null($user->no_bro)) {
            return redirect('/user/family/info');
        }
// dd($user->parmanent_vill);
        if (is_null($user->present_country) || is_null($user->permanent_country) ) {
            return redirect('/user/contact/info');
        }


        // if (is_null($user->religious_view) || is_null($user->drink) || is_null($user->smoke)  || is_null($user->diet)) {
        //     return redirect('/user/lifestyle/info');
        // }








        if($user->hasrole("Admin"))
        {

        if (!$request->id) {
            $profile = User::where('id', auth()->user()->id)->first();
        } else {

            $profile = User::where('id', $request->id)->first();
        }


        if (auth()->user()->id == $profile->id) {
            if (!$profile->pertnerPreference) {
                return redirect('/user/pertner-preference')->withSuccess('Profile Created Successfully');
            }

            elseif($profile->profile_img==null && $profile->uploadedPP()==null)
            {
                return view('user.uploadPp');
            }
        } else {


            $v = $profile->iAmVisitedBy(Auth::user());

        }


            return view('user.profile2', compact('profile'));

        }
        else
        {
            if ($request->id)
            {
                $profile = User::where('id', $request->id)
                ->whereDoesntHave('blockerOf', function ($query) {
                $query->where('user_id', Auth::id());
                })
                ->whereDoesntHave('blockss', function ($qq) {
                $qq->where('user_second_id', Auth::id());
                })
                ->first();
            }
            else
            {
                $profile = Auth::user();
            }
        if($profile)
        {

            if (auth()->user()->id == $profile->id) {
                if (!$profile->pertnerPreference) {
                    return redirect('/user/pertner-preference')->withSuccess('Profile Created Successfully');
                }
                elseif($profile->profile_img==null && $profile->uploadedPP()==null)
                {
                    // dd(1);
                    return view('user.uploadPp');
                }
            } else {


                $v = $profile->iAmVisitedBy(Auth::user());
            }

            return view('user.profile2', compact('profile'));
        }
        else
        {
            abort('404');
        }


        }

    }




    public function makeFavourite(User $user, Request $request)
    {
        $me = auth()->user();
        if($me->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        if (Auth::user()->isMyFavourite($user)) {

            Auth::user()->makeUnfavourite($user);
        } else {

            $f = Auth::user()->makeFavourite($user);
            $user->touchMainsIncrement();
            $ntfy = $f->notifications()->create([
                'userto_id' => $user->id,
                'userby_id' => Auth::id(),
                'description' => 'created',

            ]);
        }
        return back();
    }

    public function removeFavourite(User $user, Request $request)
    {

        $me = auth()->user();
        if($me->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // dd(Auth::user()->isMyFavourite($user));
        if (Auth::user()->isMyFavourite($user)) {

            // dd(1);
            Auth::user()->makeUnfavourite($user);
        } else {


            $f = Auth::user()->makeFavourite($user);
            // dd($f);
            $user->touchMainsIncrement();
            $ntfy = $f->notifications()->create([
                'userto_id' => $user->id,
                'userby_id' => Auth::id(),
                'description' => 'created',

            ]);
        }
        return back();
    }








    public function sendProposalPost(Request $request, User $user)
    {

        // dd($request->all());
        // $user = auth()->user();
        $me = Auth::user();
        if($me->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // dd($request->all());
        // $validation = Validator::make($request->all(),
        //     [
        //       'comment'=>'required|min:20|max:255',
        //   ]);

        // if($validation->fails())
        // {
        //     if($request->ajax())
        //     {
        //         return Response()->json(array(
        //             'success' => false,
        //             'errors' => $validation->errors()->toArray()
        //         ));
        //     }

        //     return back()
        //     ->withInput()
        //     ->withErrors($validation);
        // }


        // dd($me->dailyProposalLimitCompleted());

        if ($me->dailyProposalLimitCompleted())
        {


            // dd(1);
            return back()->with('error', "Your daily limite has completed");

        }
        elseif ($me->totalProposalLimitCompleted()) {
            // dd(2);
            return back()->with('error', "Your Total limite has completed");
        }
        else
        {



        $proposal = new UserProposal;
        $proposal->user_id = $me->id;
        $proposal->user_second_id = $user->id;
        $proposal->message = $request->comment;

        $proposal->save();

        // $user->touchMainsIncrement();
        // $ntfy = $proposal->notifications()->create([
        //     'userto_id' => $user->id,
        //     'userby_id' => $me->id,
        //     'description' => 'created',
        // ]);

        // $me->proposalSentSms($proposal);
        // $me->proposalSentEmail($proposal);
        return back();
        }


    }

    public function updateProfile2()
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        $user = User::where('id', auth()->user()->id)->first();
        return view('user.updateProfile', compact('user'));
    }

    public function updatePreference()
    {

        $religions=Religion::get();

        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'others', 'lsbsm' => 'update_preference']);
        $me = auth()->user();
        // dd($me->pertnerPreference);
        if (!($me->pertnerPreference)) {
            return redirect('/user/pertner-preference');
        }
        return view('user.pertnerUpdate', compact('religions'));
    }


    public function payNow($id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        $package = MembershipPackage::where('id', $id)->first();
        return view('user.payNow', compact('package'));
    }





    public function payNowPost(Request $request)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }


        $package = MembershipPackage::where('id', $request->package)
            ->first();
        // dd($package);

        if ($package) {
            $payment = UserPayment::where('user_id', Auth::id())
                ->where('status', 'pending')->first();
            if ($payment) {

                // if($request->ajax())
                // {
                //     return Response()->json(array(
                //         'success' => false,
                //         'sessionMessage' => 'Your previous payment order is pending',
                //     ));
                // }

                // return back()
                // ->with('info', 'Your previous payment order is pending');


            } else {
                $payment = new UserPayment;
            }

            $payment->status = 'pending';
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
            $payment->admin_comment = null;
            $payment->user_id = Auth::id();
            $payment->addedby_id = Auth::id();
            $payment->save();

            if ($request->payment_process == 'online') {


                $request->session()->forget(['amount', 'wmx_token']);
                $request->session()->put(['wmx_token' => 'hello', 'amount' => $payment->package_amount]);

                return redirect()->route('user.paytoPaymentGateway', $payment);
            } else {
                // if (env('APP_ENV') != 'local') {
                //     Mail::send('emails.newPendingPayment', ['payment' => $payment], function ($message) {
                //         $message->from('info@matchinglifebd.com', 'Matching Life Payment Section');
                //         $message->to('info@matchinglifebd.com',  '')
                //             ->subject('New Payment Order is submitted at ' . url('/'));
                //     });
                // }

                return back()->with('success', 'Your Payment order successfully submitted.');
            }
        }

        return back();
    }


    public function gellary()
    {
        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'others', 'lsbsm' => 'gallery']);
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        $galleries = Gallery::where('user_id', auth()->user()->id)->get();

        return view('user.gallery', compact('galleries'));
    }




    public function myAsset()
    {
        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'profile', 'lsbsm' => 'pending']);
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }

        // return $request;
        $me = Auth::user();
        if (!Auth::user()->isPaidAndValidate()) {
            return redirect('/packages');
        }
        // $v = $request->partView;
        $pendings = $me->pendingProposalContacts();
        // dd($pendings);
        return view('user.pendingProposal', compact('pendings'));
    }


    public function mySentProposal()
    {
        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'profile', 'lsbsm' => 'sentProposal']);
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // return $request;
        $me = Auth::user();
        if (!Auth::user()->isPaidAndValidate()) {
            return redirect('/packages');
        }
        // $v = $request->partView;
        $pendings = $me->ProposalFromMe();
        // dd($pendings);
        return view('user.pendingProposal', compact('pendings'));
    }


    public function myAssetaccepted()
    {
        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'nai', 'lsbsm' => 'connection']);
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // return $request;
        $me = Auth::user();
        if (!Auth::user()->isPaidAndValidate()) {
            return redirect('/packages');
        }
        // $v = $request->partView;
        $approved = $me->approvedProposalContacts();
        // dd($pendings);
        return view('user.pendingProposal', compact('approved'));
    }

    public function favourites()
    {
        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'others', 'lsbsm' => 'favourite']);
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // return $request;
        $me = Auth::user();
        if (!$me->isPaidAndValidate()) {
            return redirect('/packages');
        }
        // $v = $request->partView;
        $favourits = $me->favouriteContacts();
        // dd($favourits);
        return view('user.favourits', compact('favourits'));
    }

    public function visitors()
    {
        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'others', 'lsbsm' => 'visitor']);
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // return $request;
        $me = Auth::user();
        if (!Auth::user()->isPaidAndValidate()) {
            return redirect('/packages');
        }
        // $v = $request->partView;
        $visitors = $me->visitorcontacts();
        // dd($favourits);
        return view('user.visitors', compact('visitors'));
    }

    public function addgallery(Request $request)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        // dd($request->all());

        $file = $request->file_name;
        if ($file) {
            $fimgExt = strtolower($file->getClientOriginalExtension());

            // $fimageNewName = strtolower(str_random(8) . time() . '.' . $fimgExt);
            $fimageNewName =strtolower(date('Ymdhms').'.'.$file->getClientOriginalName());

            Storage::disk('upload')->put('users/gallery/' . $fimageNewName, File::get($file));

            // $path = 'storage/users/gallery/' . $fimageNewName;

            $doc = new Gallery;
            $doc->user_id =  Auth::id();

            $doc->file_name = $fimageNewName;


            $doc->save();
            // dd('ok');
            return back()->with('success', 'Image Uploaded Successfully');
        }
    }




    public function acceptProposal(Request $request, UserProposal $user)
    {
        $me = auth()->user();
        if($me->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }

        if (!Auth::user()->isPaidAndValidate()) {
            return redirect('/packages');
        }
        if ($user->user_second_id == Auth::id()) {
            $user->accepted = true;
            $user->editedby_id = Auth::id();
            $user->save();

            $user->user->touchMainsIncrement();
            $ntfy = $user->notifications()->create([
                'userto_id' => $user->user_id,
                'userby_id' => Auth::id(),
                'description' => 'created',
            ]);
        }

        return back();
    }

    public function cancelProposal($id)
    {
        $user = auth()->user();
        if($user->isOffline())
        {
            Auth::logout();
            return Redirect('/')->with('error', "Your account has suspanded");
        }
        if (!Auth::user()->isPaidAndValidate()) {
            return redirect('/packages');
        }

        // dd($id);
        UserProposal::find($id)->delete();

        return back();
    }




    public function blockThisUser(User $user, Request $request)
    {

        if (Auth::user()->isBlockedByMe($user)) {

            $block=Auth::user()->unblockThisUser($user);
        } else {

            $block=Auth::user()->blockThisUser($user);

            // return redirect()->intended('/');
        }



        if ($request->ajax()) {
            return Response()->json([
                'success' => true,
                'page' => View("user.ajax.blockBtnArea", [
                    'user' => $user
                ])->render()
            ]);
        }


        return redirect('/');
    }


    public function myBlock()
    {
        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'others', 'lsbsm' => 'block']);
        $type = 'block';
    	$users = Auth::user()->myRelatedUsers($type);
        return view('user.blockUsers', compact('users'));
    }


    public function makeContact(User $user, Request $request)
    {
        if (Auth::user()->contactLimit() <= 0) {
            if ($request->ajax()) {
                return Response()->json([
                    'success' => false,
                    'sessionMessage' => 'You have no contact limit for your current package.'
                ]);
            }
            return back();
        }

        if (Auth::user()->isMyContact($user)) {

            // Auth::user()->makeUncontact($user);

            if ($request->ajax()) {
                return Response()->json([
                    'success' => false,
                    'sessionMessage' => 'This contact already in your contact list.'
                ]);
            }
        } else {

            //with touch and notification
            $c = Auth::user()->makeContact($user);

            $user->touchMainsIncrement();
            $ntfy = $c->notifications()->create([
                'userto_id' => $user->id,
                'userby_id' => Auth::id(),
                'description' => 'created',

            ]);
        }

        if ($request->ajax()) {
            return Response()->json([
                'success' => true,
                'sessionMessage' => 'This contact successfully added in your contact list.',
                'page' => View("user.ajax.contactBtnArea", [
                    'user' => $user
                ])->render()
            ]);
        }

        return back();
    }


    public function myContacts()
    {
        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'others', 'lsbsm' => 'contact']);
        $type = 'contacts';
    	$users = Auth::user()->myRelatedUsers($type);
        return view('user.contacts', compact('users'));
    }


    public function search(Request $request)
    {
        // $users = auth()->user()->isActive()->get();
        // dd($users);

        $users = User::where('active', 1)->where('gender', '!=', auth()->user()->gender)->where(function ($q) use ($request) {
            $q->where('email', 'like',"%{$request->q}%")
            ->orWhere('name', 'like', "%{$request->q}%")
            ->orWhere('mobile', 'like' , "%{$request->q}%")
            ->orWhere('id', 'like', "%{$request->q}%");
       })
       ->latest()
       ->paginate(30);

        return view('user.searchResult', compact('users'));
    }


    public function verifyEmailCodeGenerate(Request $request)
    {
        // dd("ok");
        $number = rand(100000, 999999);

        $user = Auth::user();
        $user->email_verify_code = $number;
        $user->save();

        if ($user->email_verified) {
            abort(404);
        }

        ########### email start here ############
        if (env('APP_ENV') == 'production') {
            Mail::send('emails.verify_email', ['user' => $user, 'number' => $number], function ($message) use ($user, $number) {
                $message->from(env('MAIL_USERNAME'), 'vipmarriagemedia.com Email Verification');

                $message->to($user->email, $user->name)
                    ->subject('Email Verification Code, vipmarriagemedia.com');
            });
        }

        ########### email end here ############

        return redirect()->route('user.verifyEmailNow');
    }

    public function verifyEmailNow(Request $request)
    {
        return view('user.verifyEmailNow');
    }


    public function verifyEmailNowPost(Request $request)
    {
        // dd($request->all());
        $validation = Validator::make(
            $request->all(),
            [
                'verification_code' => 'required|numeric',
            ]
        );

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', ' Please, Try Again with Correct Information.');
        }

        $code = $request->verification_code;
        $user = Auth::user();
        if ($user->email_verify_code == $code) {

            $user->email_verified = true;
            $user->email_verify_code = null;
            $user->save();
            return redirect('/')->with('error', 'Your Email verification successful.');
        } else {
            return back()->with('error', 'Your code is not valide. Please, try again.');
        }
    }




    public function verifyMobileCodeGenerate(Request $request)
    {

        $number = rand(1000, 9999);

        $user = Auth::user();
        $user->mobile_verify_code = $number;
        $user->save();

        $to = $user->mobile;


        if($to)
        {
        if(strlen($to) != 14)
        {
            return back()->with('error','Please Validate Mobile Number.');
        }

        $projectName = env('PROJECT_NAME');
        // dd($projectName);
        $msg = "Dear {$user->name}, Your mobile verification code is {$user->mobile_verify_code} In {$projectName}. please, verify your mobile"; //150 characters allowed here
        // dd($msg);
        $url = smsUrl($to,$msg);
        // dd($url);
        $client = new Client();

        try {
                $r = $client->request('GET', $url);
            } catch (\GuzzleHttp\Exception\ConnectException $e) {
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }




        if ($user->mobile_verified) {
            abort(404);
        }
        return redirect()->route('user.verifyMobileNow');
    }
    return back();
    }

    public function verifyMobileNow(Request $request)
    {
        // dd("ok");
        return view('user.verifyMobileNow');
    }



    public function verifyMobileNowPost(Request $request)
    {
        $validation = Validator::make(
            $request->all(),
            [
                'verification_code' => 'required|numeric',
            ]
        );

        if ($validation->fails()) {
            return back()
                ->withErrors($validation)
                ->withInput()
                ->with('error', ' Please, Try Again with Correct Information.');
        }

        $code = $request->verification_code;
        $user = Auth::user();
        if ($user->mobile_verify_code == $code) {

            $user->mobile_verified = true;
            $user->mobile_verify_code = null;
            $user->save();
            return redirect('/')->with('error', 'Your Mobile verification successful.');
        } else {
            return back()->with('error', 'Your code is not valide. Please, try again.');
        }
    }


    public function reportPost(User $user, Request $request)
{
    // dd($request->all());
    $validation = Validator::make($request->all(),
        [
          'comment'=>'required|min:10',
      ]);

    if($validation->fails())
    {
        return redirect()->back()
        ->withErrors($validation)
        ->withInput()
        ->with('error', 'Please Try again');
    }



    $report = new Report;

    $report->user_id = Auth::id();
    $report->user_second_id = $user->id;
    $report->comment = $request->comment;
    $report->save();

    return back()->with('success', 'Your report successfully submited, Thank you .');
}



public function userDetailsPrint(User $profile)
{

    return view('user.userDetailsPrint', compact('profile'));
}


public function galleryDel(Gallery $gallery)
{
    $gallery->delete();
    return back()->with('success', 'Image Deleted Successfully');
}

public function pertnerSearch()
{
    request()->session()->forget(['lsbm', 'lsbsm']);
    request()->session()->put(['lsbm' => 'profile', 'lsbsm' => 'pertnerSearch']);
    $districts = District::orderBy('name')->get();
    $areas = District::orderBy('name')->get();
    $religions=Religion::get();

    return view('user.pertnerSearch', compact('religions','districts','areas'));
}





public function userAdvanceSearch(Request $request)
{


    $me = Auth::user();
    $minimum_age = $request->minimum_age;
    $maximum_age = $request->maximum_age;
    $users = User::where('active', 1)->where(function ($q) use ($request) {
         $q->where('gender', Auth::user()->oltGender());
         if ($request->minimum_age != null and $request->maximum_age != null) {
            $start = Carbon::now()->subYear($request->minimum_age)->toDateString();
            $end = Carbon::now()->subYear($request->maximum_age)->toDateString();
            $q->whereBetween('dob', [$end, $start]);
        }
        elseif ($request->minimum_age !== null) {
            $minAgeDate = Carbon::now()->subYear($request->minimum_age)->toDateString();
            $q->where('dob', '<=', $minAgeDate);
        } elseif ($request->maximum_age != null) {
            $maxAgeDate = Carbon::now()->subYear($request->maximum_age + 1)->toDateString();
            $q->where('dob', '>=', $maxAgeDate);
        }
        if( $request->religion)
            {
                $q->where('religion', $request->religion);
            }

            if( $request->education_level)
            {
                if($request->education_level != "Any")
                {
                    $q->where('education_level', $request->education_level);
                }


            }
            if( $request->marital_status)
            {
                if($request->marital_status != "Any")
                {
                    $q->where('marital_status',  $request->marital_status);
                }
            }

            if( $request->profession)
            {
                if($request->education_level != "Any")
              {
                $q->where('profession', $request->profession);
              }

            }
            if( $request->country)
            {

            if($request->country != "Any")
              {
                $q->where('country', $request->country);
                $q->orWhere('permanent_country', $request->country);
                $q->orWhere('present_country', $request->country);
              }

            }

            if( $request->area)
            {
            if($request->area != "Any")
            {
                $q->where('parmanent_district', $request->area);
                $q->orWhere('present_district', $request->area);
            }

            }

    })
    ->latest()
    ->paginate(30);

    return view('user.searchResult', [

        'users' => $users,
        'minimum_age' => $minimum_age,
        'maximum_age' => $maximum_age,
        'gender' => $request->gender,
        'token' => $request->_token,
        'religion' => $request->religion,
        'marital_status' => $request->marital_status,
        // 'location' => $request->location,
        'education_level' => $request->education_level,
        'profession' => $request->profession,
        // 'minimum_height' => $request->minimum_height,
        // 'maximum_height' => $request->maximum_height,
        // 'frontPages' => $frontPages,
        'me' => $me
    ]);
}
public function partner(Request $request)
{
   $myPf = PertnerPreference::where('user_id',Auth::id())->first();

   $allPf =User::where('religion',$myPf->religion)->where('profession', );

}




}
