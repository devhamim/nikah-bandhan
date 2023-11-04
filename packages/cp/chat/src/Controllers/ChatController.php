<?php

namespace Cp\Chat\Controllers;

use DB;
use Auth;
use Cache;
use GeoIP;
use Validator;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Page;
use App\Model\Country;
use App\Http\Requests;
use Cp\Chat\Model\Chat;
use Cp\Chat\Model\Chatable;
use Illuminate\Http\Request;
use Cp\Smartshop\Model\Shop;
use Illuminate\Http\Response;
use Cp\Chat\Model\MessageFile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function userMessageDashboard(Request $request)
    {

        $frontPages = Cache::remember('frontPages', 518400, function () {
                return Page::where('active', true)->get();
            });

    	$ru = Auth::user()->chatTo()->where('autoload',true)->first();
    	if($ru)
    	{
    		if($ru->user())
    		{
                if(! Auth::user()->isPaidAndValidate())
                {
                    return redirect()->route('page', 'membership_package');
                }

                Auth::user()->touchMsgDelete();
    			return view('chat::messageDashboard',[
    				'ru'=>$ru->chatBy,
    				'user_type'=>'user_old',
    				'chatable'=>$ru,
                    'frontPages'=>$frontPages
    			]);
    		}
    		elseif($ru->shop())
    		{
    			return view('chat::messageDashboard',[
    				'rs'=>$ru->chatBy,
    				'user_type'=>'shop_old',
    				'chatable'=>$ru
    			]);
    		}

    		elseif($ru->bazar())
    		{
    			return view('chat::messageDashboard',[
    				'rb'=>$ru->chatBy,
    				'user_type'=>'bazar_old',
    				'chatable'=>$ru
    			]);
    		}
    	}


        if(! Auth::user()->isPaidAndValidate())
        {
            return redirect()->route('page', 'membership_package');
        }

        Auth::user()->touchMsgDelete();
    	return view('chat::messageDashboard',[
    		'ru'=>Null,
    		'user_type'=>'user_no',
            'frontPages'=>$frontPages
    	]);
    	
    }

    public function shopMessageDashboard(Request $request, Shop $shop)
    {
    	if(Auth::user()->hasAnyRoleOfShopPermission($shop))
    	{
	    	$ru = $shop->chatTo()->where('autoload',true)->first();
	    	if($ru)
	    	{
	    		if($ru->user())
	    		{

	    			return view('chat::shopMessageDashboard',[
	    				'shop'=>$shop,
	    				'ru'=>$ru->chatBy,
	    				'user_type'=>'user_old',
	    				'chatable'=>$ru
	    			]);
	    		}
	    		elseif($ru->shop())
	    		{
	    			return view('chat::shopMessageDashboard',[
	    				'shop'=>$shop,
	    				'rs'=>$ru->chatBy,
	    				'user_type'=>'shop_old',
	    				'chatable'=>$ru
	    			]);
	    		}

	    		elseif($ru->bazar())
	    		{
	    			return view('chat::shopMessageDashboard',[
	    				'shop'=>$shop,
	    				'rb'=>$ru->chatBy,
	    				'user_type'=>'bazar_old',
	    				'chatable'=>$ru
	    			]);
	    		}
	    	}

	    	return view('chat::shopMessageDashboard',[
	    		'shop'=>$shop,
	    		'ru'=>Null,
	    		'user_type'=>'user_no']);
    	}
    	abort(401);
    }

    public function userMessage(Request $request)
    {
        $frontPages = Cache::remember('frontPages', 518400, function () {
                return Page::where('active', true)->get();
            });

    	$ru = User::where('id', $request->user)
        ->whereDoesntHave('blockerOf',function($query){
                $query->where('user_id', Auth::id());
            })
        ->whereDoesntHave('blockss', function($qq){
            $qq->where('user_second_id', Auth::id());
        })
        ->first();
        if(!$ru)
        {
            abort(404);
        }
        if($ru->id == Auth::id())
        {
            return back();
        }
    	//ru requested user
    	
    	$chatable = Auth::user()->chatableIfHasChatUser($ru);

    	if($chatable)
    	{
            if(! Auth::user()->isPaidAndValidate())
            {
                return redirect()->route('page', 'membership_package');
            }
            
    		return view('chat::messageDashboard',[
                'ru'=>$ru,
                'user_type'=>'user_old',
                'chatable'=>$chatable,
                'frontPages'=>$frontPages
            ]);
    	}    

        if(! Auth::user()->isPaidAndValidate())
        {
            return redirect()->route('page', 'membership_package');
        }

    	return view('chat::messageDashboard',[
            'ru'=>$ru,
            'user_type'=>'user_new',
            'frontPages'=>$frontPages
        ]);
    }

    public function shopMessage(Request $request)
    {
    	$rs = Shop::findOrFail($request->shop);
    	//rs requested shop
    	
    	$chatable = Auth::user()->chatableIfHasChatShop($rs);
    	if($chatable)
    	{
    		return view('chat::messageDashboard',['rs'=>$rs,'user_type'=>'shop_old','chatable' =>$chatable]);
    	}

    	return view('chat::messageDashboard',['rs'=>$rs,'user_type'=>'shop_new']);
    }

    public function bazarMessage(Request $request)
    {
    	$rb = Shop::findOrFail($request->shop);
    	//rb requested bazar
    	return view('chat::messageDashboard',['rb'=>$rb,'user_type'=>'bazar']);
    }

    public function chatParticipantsAuto(Request $request)
    {
    	$chatto = Auth::user()->chattoAll;
    	if($request->ajax())
    	{
    		return Response()->json(View('chat::ajaxBlades.chatsAll',['chatto'=>$chatto])->render());
    	}
    }

    public function chatNotifyParticipantsAuto(Request $request)
    {
        $chatto = Auth::user()->chattoAll;
        if($request->ajax())
        {
            return Response()->json(View('user.notifications.notify_msg',['chatto'=>$chatto])->render());
        }
    }

    
    public function chatParticipantsOfShopAuto(Request $request, Shop $shop)
    {
    	$chatto = $shop->chattoAll;
    	if($request->ajax())
    	{
    		return Response()->json(View('chat::ajaxBlades.chatsAllOfShop',['chatto'=>$chatto])->render());
    	}
    }

    public function chatParticipantsOfBazarAuto(Request $request, Bazar $bazar)
    {
    	$chatto = $bazar->chattoAll;
    	if($request->ajax())
    	{
    		return Response()->json(View('chat::ajaxBlades.chatsAllOfBazar',['chatto'=>$chatto])->render());
    	}
    }

    public function chatSingle(Request $request, Chatable $chatable)
    {
    	Auth::user()->chatTo()
    	->where('autoload',true)
    	->update(['autoload'=>false]);

        $chatable->autoload = true;
        $chatable->save();

    	if($chatable->user())
    	{
	    	$ru = $chatable->chatBy;   	
	    	if($request->ajax())
	    	{
	    		return Response()->json([
	    			'formOldMsg' => View('chat::includes.formOldMsg',['chatable'=>$chatable,'ru'=>$ru])->render()
	    		]);
	    	}
    	}

    	if($chatable->shop())
    	{
	    	$rs = $chatable->chatBy;   	
	    	if($request->ajax())
	    	{
	    		return Response()->json([
	    			'formOldMsg' => View('chat::includes.formOldMsg',['chatable'=>$chatable,'rs'=>$rs])->render()
	    		]);
	    	}
    	}

    	if($chatable->bazar())
    	{
	    	$rs = $chatable->chatBy;   	
	    	if($request->ajax())
	    	{
	    		return Response()->json([
	    			'formOldMsg' => View('chat::includes.formOldMsg',['chatable'=>$chatable,'rb'=>$rb])->render()
	    		]);
	    	}
    	}
    	
    	return back();
    }

    public function chatSingleAtShop(Request $request, Chatable $chatable)
    {
    	if($chatable->user())
    	{
	    	$ru = $chatable->chatBy;
	    	$shop = $chatable->chatTo;

	    	$shop->chatTo()
	    	->where('autoload',true)
	    	->update(['autoload'=>false]);

	        $chatable->autoload = true;
	        $chatable->save();

	    	if($request->ajax())
	    	{
	    		return Response()->json([
	    			'formOldMsg' => View('chat::includes.formOldMsg',[
	    				'chatable'=>$chatable,
	    				'ru'=>$ru])->render()
	    		]);
	    	}
    	}

    	return back();
    }


    public function publishedMessageAuto(Request $request, Chatable $chatable)
    {
    	if($request->ajax())
    	{
    		return Response()->json(View('chat::includes.messagesAll',[
    			'chatBus'=>$chatable->chatBus,
    			'chatable'=>$chatable
    		])->render());
    	}
    	return back();
    }

    public function newMsg(Request $request, Chatable $chatable)
    {
        // $bus = $chatable->publishes()
        // ->where('seen',0)->first();
        // if($bus)
        // {
        // 	return Response()->json([
        //   'newMsges' => View('chat::includes.messageSingle',[
        //         	'chatable'=>$chatable,
        //         	'bus'=>$bus
        //         ])->render()]);
        // }

        $buses = $chatable->publishes()
        ->where('seen', 0)->orderBy('id','desc')->get();
        if($buses->count())
        {
            return Response()->json([
            'newMsges' => View('chat::includes.messagesAll',[
                    'chatable'=>$chatable,
                    'chatBus' =>$buses
                ])->render()]);

        }
        return 'ok';       
    }

    public function fileMsgImageGet(Request $request)
    {
        $entry = MessageFile::where('file_name', '=', $request->filename)->firstOrFail();
        $file = Storage::disk('public')->get('message/image/'.$request->filename);
 
        return (new Response($file, 200))
              ->header('Content-Type', $entry->file_mime);
    }

    public function fileMsgVideoGet(Request $request)
    {

        $entry = MessageFile::where('file_name', '=', $request->filename)->firstOrFail();

        if($entry)
        {
            $entry->viewIncrease();
        }
        
        $file = Storage::disk('public')->get('message/video/'.$request->filename);
 
        return (new Response($file, 200))
              ->header('Content-Type', $entry->file_mime);
    }

    public function fileMsgAudioGet(Request $request)
    {

        $entry = MessageFile::where('file_name', '=', $request->filename)->firstOrFail();
        if($entry)
        {
            $entry->viewIncrease();
        }
        $file = Storage::disk('public')->get('message/audio/'.$request->filename);
 
        return (new Response($file, 200))
              ->header('Content-Type', $entry->file_mime);
    }

    public function fileMsgPdfGet(Request $request)
    {

        $entry = MessageFile::where('file_name', '=', $request->filename)->firstOrFail();
        if($entry)
        {
            $entry->viewIncrease();
        }

        $file = Storage::disk('public')->get('message/pdf/'.$request->filename);
 
        return (new Response($file, 200))
              ->header('Content-Type', $entry->file_mime);
    }
}