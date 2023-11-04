<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Page;
use App\Models\Cast;
use App\Models\Blog as Post;
use App\Models\Contact;
use App\Models\BlogCategory;
use App\Models\District;
use App\Models\Upazila;
use App\Models\MembershipPackage;
use App\Models\SuccessProfile;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
use App\Models\WebsiteParameter;
use App\Models\WpPost;

class WelcomeController extends Controller
{
    public function index()
    {
        $everyStagePage = Page::find(25);

        request()->session()->forget(['lsbm', 'lsbsm']);
        request()->session()->put(['lsbm' => 'profile', 'lsbsm' => 'home']);
        if (auth()->user()) {
            return redirect('/user/dashboard');
        }

        $packages = MembershipPackage::where('package_type',"Bangladesh")->get();
        $stories = SuccessProfile::latest()->paginate(10);

        // $posts = Post::where('publish_status', 'published')->latest()->paginate(4);

        $posts = WpPost::orderBy('post_modified','desc')->where('post_parent', 0)->where('post_type', 'post')->where('post_status','publish')->paginate(4);
    
        // dd($stories);
        // dd("iojioj");
        // dd($posts);
        return view('welcome' ,compact('packages','stories','posts','everyStagePage'));
    }
    public function registrationUser(){
        return view('welcome.registrationUser');
    }
    public function successstories_details($id){
        $stories=SuccessProfile::where('id','<>',$id)->latest()->limit('10')->get();
        $singleStory=SuccessProfile::where('id',$id)->first();
        return view('stories.index',[
            'stories'=>$stories,
            'singleStory'=>$singleStory
    ]);
    }
    public function welcome()
    {

        $user = auth()->user();
        if($user->isOffline())
        {
            Session::flush();
            Auth::logout();

            return Redirect('/')->with('error', "Your account has suspanded");
        }
        $users = User::where('id', '!=', auth()->user()->id)->where('gender','!=', auth()->user()->gender)->where('final_check', true)->where('featured', true)->where('user_type', "online")->OrderBy('id', 'DESC')->paginate(6);
// dd($users);
        $recent = User::where('id', '!=', auth()->user()->id)->where('gender','!=', auth()->user()->gender)->where('final_check', true)->OrderBy('id', 'DESC')->paginate(5);


        if (is_null($user->name) || is_null($user->gender) ||  is_null($user->religion)) {
            return redirect('/user/incomplete-profile');
        }
        return view('welcome2', compact('users', 'recent'));
    }


    public function featureProfiles()
    {
        $users = User::where('id', '!=', auth()->user()->id)->where('gender','!=', auth()->user()->gender)->where('final_check', true)->where('featured', true)->where('user_type', "online")->OrderBy('id', 'DESC')->paginate(30);
        $type = "Recent Profiles";
        return view('user.profilesGroup', compact('users', 'type'));
    }


    public function visitorProfiles()
    {
        $users = auth()->user()->visitors()->paginate(30);
        $type = "Visitor Profiles";
        return view('user.profilesGroup', compact('users', 'type'));
    }


    public function favouriteProfiles()
    {
        $users = auth()->user()->favs()->paginate(30);
        $type = "My Favourite Profiles";
        return view('user.profilesGroup', compact('users', 'type'));
    }


    public function dashboard()
    {
        return view('dashboard');
    }

    public function profile3()

    {
        return view('user.profile3');
    }





    public function page($page, Request $request)
    {

        $page = Page::where('route_name', $page)
            ->where('active', true)->first();


        if ($page) {

            if ($page->route_name == "contact-us") {
                return view('contactUs', ['page'=>$page]);
            }

            return view('welcome.page', [
                'page' => $page,
            ]);
        } else {
            abort(404);
        }
    }




    public function packagelist()
    {


        $package_sogan=WebsiteParameter::pluck('package_slogan')->first();

        $packages = MembershipPackage::where('status',1)->where('package_type',"Bangladesh")->get();


        return view('membershipPackage', [
            'packages' => $packages,
            'package_sogan'=>$package_sogan

        ]);
    }



    public function contactUsPost(Request $request)
    {


        // dd($request->all());


        // return $request->all();
        $validation = Validator::make(
            $request->all(),
            [
                // 'name' => ['required', 'string', 'max:255', 'min:3'],
                // 'business_email' => ['nullable', 'string', 'max:255'],
                // 'company_name' => ['required', 'string'],
                // 'phone_number' => ['required', 'min:11'],
                // 'country' => ['required', 'unique:users,email', 'email'],
                // 'message_body' => ['required', 'min:5'],
            ]
        );

        if ($validation->fails()) {

            return back()
                ->with('warning', 'Please, fill-up all the fields correctly and try again')
                ->withInput()
                ->withErrors($validation);
        }
        // return $request->all();

        // $check = User::where('username', $request->username)->where('email', $request->email)->first();
        // dd($check);
        // if($check)
        // {
        //     return back()->with('error', 'Your username or email already exist. Please login and apply again.');

        // }
        // $newUser = new User;
        // $newUser->username = $request->username;
        // $newUser->password =  Hash::make($request->password);
        // $newUser->active = true;
        // $newUser->email = $request->email;
        // $newUser->mobile = $request->mobile;
        // $newUser->addedby_id = 0;
        // $newUser->save();

        $dd = Contact::create([
            'name' => $request->name,
            'business_email' => $request->business_email,
            'company_name' => $request->company_name,
            'phone_number' => $request->phone_number,
            'country' => $request->country,
            'message_body' => $request->message_body,
            'seen_status' => false
        ]);
        // dd($dd);

        return back()->with('success', 'Thanks, Your message submitted successfully. Wait untile admin review.');
    }


    public function blogDetails()
    {

        return view('blogDetails');
    }
    public function mymatch(){
        return view('mymatch');
    }

    public function disconnectAdminMember()
    {

        if(Auth::check())
        {
           $roleUsers= DB::table('model_has_roles')->pluck('model_id');
           $acivityChange=User::whereIn('id',$roleUsers)->update(['active' => 0]);
           if($acivityChange)
           {
            session()->flush();
            Auth::logout();
            return back();

           }
        }
        return back();
    }
    public function connectAdminMember(){
        if(Auth::check())
        {
           $roleUsers= DB::table('model_has_roles')->pluck('model_id');
           $acivityChange=User::whereIn('id',$roleUsers)->update(['active' => 1]);
           if($acivityChange)
           {

            return back()->with('success', 'All Admin User is  Active');
           }
        }
        return back();

    }
    public function downloadpdf($id)
    {

    }


    public function blogDetails2($id)
    {


        $post = Post::find($id);



    if($post)
        {
        $d= explode(',',$post->categories);
        $cats =BlogCategory::whereIn('id',$d)->get();
        foreach($cats as $cat){
            $cat->increment('seen',1);
            $cat->save();
        }


        if($post->seen == null)
        {
            $post->seen = 1;
        }else{
            $post->increment('seen',1);
        }

        $post->save();
        // dd($post);
        return view('blogDetails2', compact('post'));
    }
    return back();
}



    function load_districtFetch(Request $request)
    {
        // dd($request->all());

        $data = District::where('division_id', $request->value)->get();
        // $html = view('vehicle.vh', ['datas' => $data])->render();
        // return $data;
        //   $dd($data);

        if ($request->ajax()) {
            return Response()->json([
                'success' => true,
                'datas' => $data
            ]);
        }

        return back();
    }



    function load_thanaFetch(Request $request)
    {
        // dd($request->all());
        // return $request->value;

        $data = Upazila::where('district_id', $request->value)->get();

        // return $data;
        //   $dd($data);

        if ($request->ajax()) {
            return Response()->json([
                'success' => true,
                'datas' => $data
            ]);
        }

        return back();
    }




    function castfetch(Request $request)
    {

        // dd($request->all());
        $data = Cast::where('religion_id', $request->value)->get();
        //   $dd($data);

        if ($request->ajax()) {
            return Response()->json([
                'success' => true,
                'datas' => $data
            ]);
        }

        return back();
    }
    function blogs()
    {
          $popurlarCats=BlogCategory::orderBy('seen','Desc')->take(7)->get();
          $letastPosts=Post::where('publish_status','published')->orderBy('seen','desc')->take(2)->get();
          $posts=Post::where('publish_status','published')->orderBy('id','desc')->get();
          $popularPosts=Post::where('publish_status','published')->orderBy('seen','desc')->take(7)->get();
          return view('blog.blogs',compact('posts','popularPosts','popurlarCats','letastPosts'));
    }
    function categories($id,$slug){

    $posts=Post::where('categories','like', '%'.$id.'%')->where('publish_status','published')->get();
    $popularPosts=Post::where('publish_status','published')->orderBy('seen','desc')->take(7)->get();
    $popurlarCats=BlogCategory::orderBy('seen','Desc')->take(7)->get();
    return view('blog.categories',compact('posts','popularPosts','popurlarCats'));
    }

    public function sitemap()
    {
        $data['blogs'] = Post::where('publish_status', 'published')->get();
        $data['success_profiles'] = SuccessProfile::all();
        $data['pages'] = Page::where('active', true)->get();

        return response()->view('sitemap', $data)->header('Content-Type', 'text/xml');
    }

    public function robotTxt()
    {
        return response()->view('robotTxt')->header('Content-Type', 'text/plain');
    }


}
