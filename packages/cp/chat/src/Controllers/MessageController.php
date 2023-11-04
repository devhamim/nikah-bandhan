<?php

namespace Cp\Chat\Controllers;

use Auth;
use GeoIP;
use Validator;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Country;
use App\Http\Requests;
use Cp\Chat\Model\Chat;
use Cp\Chat\Model\Chatable;
use Cp\Smartshop\Model\Shop;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function msgNewCreate(Request $request)
    {

        $ru = User::findOrFail($request->users);
        if($ru->id == Auth::id())
        {
            return back();
        }
        $ru->chatTo()
        ->where('autoload',true)
        ->update(['autoload'=>false]);

        Auth::user()->chatTo()
        ->where('autoload',true)
        ->update(['autoload'=>false]); 
        $user = Auth::user();

        // $chatableOne = $user->chatTo()
        //     ->where('chatby_id', $ru->id)
        //     ->where('chatby_type','App\Model\User')
        //     ->first();

        // if($chatableOne)
        // {
        //     $chat = $chatableOne->chat;

        //     foreach($chat->chatables as $chatable)
        //     {
        //        $u = $chatable->chatTo;
        //        $u->chatTo()
        //         ->where('autoload',true)
        //         ->update(['autoload'=>false]);

        //        $p = $chatable->publishes()->create([]);
        //        $user->chatPublishedBy()->save($p);
        //        $chatable->autoload = true;
        //        $chatable->save();
        //        // $u = $chatable->chatTo;
        //        // $u->chatPublishedTo()->save($p);
        //     }

        //     return back();
        // }

        // $chatableTwo = $user->chatBy()
        //     ->where('chatto_id', $ru->id)
        //     ->where('chatto_type','App\Model\User')
        //     ->first();
        // if($chatableTwo)
        // {
        //     $chat = $chatableTwo->chat;
        //     foreach($chat->chatables as $chatable)
        //     {
        //        $p = $chatable->publishes()->create([]);
        //        $user->chatPublishedBy()->save($p);
        //        $u = $chatable->chatTo;
        //        $u->chatPublishedTo()->save($p);
        //     }

        //     return back();
            
        // }

        $chat = Chat::create(['addedby_id'=>Auth::id()]);


        $msgBody = trim($request->message_body) ?: Null;

        $msg = Auth::user()->messageOfUser()
        ->whereMessageStatus('temp')
        ->where('chat_id',$chat->id)
        ->orderBy('id','desc')
        ->first();

        if(!$msg)
        {
            $msg = Auth::user()->messageOfUser()
            ->create([
                'message_status'=>'temp',
                'chat_id'=>$chat->id
            ]);
        }

        $msg->message_body = $msgBody;
        $msg->message_slug = $request->message_slug;
        $msg->message_title = $request->message_title;
        $msg->message_status = 'published';
        $msg->save();


        $chatable1 = $chat->chatables()->create([
            'status'=>'regular',
            'addedby_id'=>Auth::id(),
            'autoload'=>true
        ]);
        
        $user->chatTo()->save($chatable1);
        $ru->chatBy()->save($chatable1);

        $p = $chatable1->publishes()->create([]);
        $msg->publish()->save($p);
        $user->chatPublishedBy()->save($p);

        $chatable2 = $chat->chatables()->create([
            'status'=>'regular',
            'addedby_id'=>Auth::id(),
            'autoload'=>true
        ]);
        $user->chatBy()->save($chatable2);
        $ru->chatTo()->save($chatable2);
        $ru->touchMsgIncrement();

        $q = $chatable2->publishes()->create([]);
        $msg->publish()->save($q);
        $user->chatPublishedBy()->save($q);



        // $ntfy = $post->notification()
        // ->where([
        //     'notifyto_id' => $postOwner->id,
        //     'notifyto_type' => 'App\Model\User'
        //     ])->first();
        // if($ntfy)
        // {
        //     $post->notification()
        //     ->where([
        //     'notifyto_id' => $postOwner->id,
        //     'notifyto_type' => 'App\Model\User'
        //     ])->update([]);
        // }
        // else
        // {
        //     $ntfy = $post->notification()->create([]);
        //     $ntfy->description = 'created';
        //     $postOwner->notifyTo()->save($ntfy);
        //     $request->user()->notifyBy()->save($ntfy);
        //     $postOwner->touchMainsIncrement();
        // }



        if($request->ajax())
        {
            $chatto = Auth::user()->chattoAll;
            return Response()->json([
                'formOldMsg' => View('chat::includes.formOldMsg',[
                    'chatable'=>$chatable1,
                    'ru'=>$ru])->render(),
                'newChatto' => View('chat::ajaxBlades.chatsAll',['chatto'=>$chatto])->render()
            ]);
        }



        

        // $chat->users()->saveMany([
        //     $user,$ru
        // ]);



        // $msg = $user->messageOfUser()
        // ->whereMessageStatus('temp')
        // ->orderBy('id','desc')
        // ->first();
        // if(!$msg)
        // {
        //     $msg = $user->messageOfUser()->create([]);
        //     $msg->message_status = 'temp';
        //     $msg->save();
        // }

        // $post->post_body = $postTemp->post_body ?: $postBody;
        // $msg->message_body = $msgBody;
        // $msg->message_slug = $request->message_slug;
        // $msg->message_title = $request->message_title;
        // $msg->message_status = 'published';
        // $msg->save();

        //publish
        // $publish = $msg->publish()->create(['chat_id'=>$chat->id]);
        // $user->msgPublishedBy()->save($publish);
        // $user->msgPublishedTo()->save($publish);
        // $publish->save();

        // $publishRU = $msg->publish()->create(['chat_id'=>$chat->id]);
        // $user->msgPublishedBy()->save($publishRU);
        // $ru->msgPublishedTo()->save($publishRU);
        // $publishRU->save();

        // if($viewer == 'only_me')
        // {
        //     if ($request->ajax()) {
        //     return Response()->json(View('user.includes.wallPost', [
        //         'post' => $post,
        //         'publish' => $publish
        //         ])->render());
        //     }
        //     else
        //     {
        //         return back();
        //     }
        // }


        // Event::fire(new UserPostCreated($user, $post, $viewer));
        // if ($request->ajax()) {
        //     return Response()->json(View('user.includes.wallPost', [
        //         'post' => $post,
        //         'publish'=>$publish
        //         ])->render());
        // }
        // else
        // {
        //     return back();
        // }
    
        return back();
    }

    public function msgNewCreateShop(Request $request, Shop $shop)
    {
        $user = Auth::user();
        $user->chatTo()
        ->where('autoload',true)
        ->update(['autoload'=>false]);

        $shop->chatTo()
        ->where('autoload',true)
        ->update(['autoload'=>false]);

        $chat = Chat::create(['addedby_id'=>Auth::id()]);


        $msgBody = trim($request->message_body) ?: Null;

        $msg = Auth::user()->messageOfUser()
        ->whereMessageStatus('temp')
        ->where('chat_id', $chat->id)
        ->orderBy('id','desc')
        ->first();

        if(!$msg)
        {
            $msg = Auth::user()->messageOfUser()
            ->create([
                'message_status'=>'temp',
                'chat_id'=>$chat->id
            ]);
        }

        $msg->message_body = $msgBody;
        $msg->message_slug = $request->message_slug;
        $msg->message_title = $request->message_title;
        $msg->message_status = 'published';
        $msg->save();


        $chatable1 = $chat->chatables()->create([
            'status'=>'regular',
            'addedby_id'=>Auth::id(),
            'autoload'=>true
        ]);

        $user->chatTo()->save($chatable1);
        $shop->chatBy()->save($chatable1);

        $p = $chatable1->publishes()->create([]);
        $msg->publish()->save($p);
        $user->chatPublishedBy()->save($p);

        $chatable2 = $chat->chatables()->create([
            'status'=>'regular',
            'addedby_id'=>Auth::id(),
            'autoload'=>true
        ]);
        $user->chatBy()->save($chatable2);
        $shop->chatTo()->save($chatable2);

        $q = $chatable2->publishes()->create([]);
        $msg->publish()->save($q);
        $user->chatPublishedBy()->save($q);

        if($request->ajax())
        {
            $chatto = Auth::user()->chattoAll;
            return Response()->json([
                    'formOldMsg' => View('chat::includes.formOldMsg',[
                        'chatable'=>$chatable1,
                        'rs'=>$shop])->render(),
                    'newChatto' => View('chat::ajaxBlades.chatsAll',['chatto'=>$chatto])->render()
                ]);
        }
        return back();
    }

    public function msgCreateContinue(Request $request, Chat $chat)
    {

        $msgBody = trim($request->message_body) ?: Null;
        $msg = Auth::user()->messageOfUser()
        ->whereMessageStatus('temp')
        ->where('chat_id', $chat->id)
        ->orderBy('id','desc')
        ->first();

        if(!$msg)
        {
            $msg = Auth::user()->messageOfUser()
            ->create([
                'message_status'=>'temp',
                'chat_id'=>$chat->id
            ]);
        }

        $msg->message_body = $msgBody;
        $msg->message_slug = $request->message_slug;
        $msg->message_title = $request->message_title;
        $msg->message_status = 'published';
        $msg->save();

        $myChatable = '';
        $myBus = '';

        foreach($chat->chatables as $chatable)
        {
           $u = $chatable->chatTo;
           $u->chatTo()
            ->where('autoload',true)
            ->update(['autoload'=>false]);

           // if($u->id !== Auth::id() && $chatable->user())
           // {
           //      if($chatable->unseenCount())
           //      {
           //          $u->touchMsgIncrement();
           //      }                
           // }

           $p = $chatable->publishes()->create([]);
           
           $msg->publish()->save($p);
           Auth::user()->chatPublishedBy()->save($p);
           $chatable->autoload = true;
           $chatable->save();
           if($u->id == Auth::id() && $chatable->user())
           {
                $myChatable = $chatable;
                $p->seen = true;
                $p->save();
                $myBus = $p;
           }

        }

        if($request->ajax())
        {
            // $myChatable = $chat->chatables()
            // ->where('chatto_id',Auth::id())
            // ->where('chatto_type','App\Model\User')
            // ->orderBy('id','desc')
            // ->first();
            // $myBus = $myChatable->publishes()
            // ->where('publishedby_id',Auth::id())
            // ->where('publishedby_type','App\Model\User')
            // ->orderBy('id','desc')->first();
            // $myBus->seen = 1;
            // $myBus->save();

            return Response()->json([
                    'newMsgSingle' => View('chat::includes.messageSingle',['chatable'=>$myChatable,'bus'=>$myBus])->render()
                ]);

        }
        return back();
    }

    public function newMsgFile(Request $request, Chat $chat)
    {
         

        // $this->validate($request, [
        // 'file' => 'mimes:jpeg,bmp,png,gif,pdf,mp4,webm,ogv,ogg,mpga,mpeg,wav'
        // ]);
        // 

        $user = Auth::user();

        $msg = $user->messageOfUser()
        ->whereMessageStatus('temp')
        ->where('chat_id',$chat->id)
        ->orderBy('id','desc')
        ->first();

        if(!$msg)
        {
            $msg = $user->messageOfUser()
            ->create([
                'message_status'=>'temp',
                'chat_id' => $chat->id
            ]);
        }
        

        if($request->hasFile('file'))
        {
            $file = $request->file;
            $extension = $file->getClientOriginalExtension();
            $mime = $file->getClientMimeType();
            $size =$file->getSize();
            $original_name = $file->getClientOriginalName();
            if($mime == 'video/mp4' ||
              $mime == 'video/webm' ||
              $mime == 'video/ogg')
            {
                $randomFileName = $user->id.'_v_'.$msg->id.'_'.date('Y_m_d_his').'_'.rand(11111111,99999999).'.'.$extension;

            // list($originalWidth,$originalHeight) = getimagesize($file);

            Storage::disk('public')
            ->put('message/video/'.$randomFileName, File::get($file));

            $newFile =  $msg->files()->create([]);
            $newFile->file_name = $randomFileName;
            $newFile->original_name = $original_name;
            $newFile->file_type = 'video';
            $newFile->file_mime = $mime;
            $newFile->file_size = $size;
            $newFile->file_ext = $extension;
            $newFile->file_alt = 'connectingpark';
            $newFile->addedby_id = Auth::id();
            $newFile->save();

            }
            elseif ($mime == 'audio/mp3' ||
                    $mime == 'audio/ogg' || 
                    $mime == 'audio/wav') 
            {
                $randomFileName = $user->id.'_a_'.$msg->id.'_'.date('Y_m_d_his').'_'.rand(11111111,99999999).'.'.$extension;

                Storage::disk('public')
                ->put('message/audio/'.$randomFileName, File::get($file));

                $newFile =  $msg->files()->create([]);
                $newFile->file_name = $randomFileName;
                $newFile->original_name = $original_name;
                $newFile->file_type = 'audio';
                $newFile->file_mime = $mime;
                $newFile->file_size = $size;
                $newFile->file_ext = $extension;
                $newFile->file_alt = 'connectingpark';
                $newFile->addedby_id = Auth::id();
                $newFile->save();
            } 
            elseif ($mime == 'application/pdf') 
            {
                $randomFileName = $user->id.'_p_'.$msg->id.'_'.date('Y_m_d_his').'_'.rand(11111111,99999999).'.'.$extension;

                Storage::disk('public')
                ->put('message/pdf/'.$randomFileName, File::get($file));
                $newFile =  $msg->files()->create([]);
                $newFile->file_name = $randomFileName;
                $newFile->original_name = $original_name;
                $newFile->file_type = 'pdf';
                $newFile->file_mime = $mime;
                $newFile->file_size = $size;
                $newFile->file_ext = $extension;
                $newFile->file_alt = 'connectingpark';
                $newFile->addedby_id = Auth::id();
                $newFile->save();
            }

            elseif ($mime == 'image/jpeg' ||
                    $mime == 'image/png' || 
                    $mime == 'image/gif' ) 
            {
                $randomFileName = $user->id.'_i_'.$msg->id.'_'.date('Y_m_d_his').'_'.rand(11111111,99999999).'.'.$extension;

                Storage::disk('public')
                ->put('message/image/'.$randomFileName, File::get($file));

                $newFile =  $msg->files()->create([]);
                $newFile->file_name = $randomFileName;
                $newFile->original_name = $original_name;
                $newFile->file_type = 'image';
                $newFile->file_mime = $mime;
                $newFile->file_size = $size;
                $newFile->file_ext = $extension;
                $newFile->file_alt = 'connectingpark';
                $newFile->addedby_id = Auth::id();
                $newFile->save();
            }      
        }
        if($request->ajax())
        {
            return Response()->json(['success'=>true]);
        }

        return back();
    }

    public function newUserMsgFile(Request $request, User $user)
    {
        //
    }

    public function newShopMsgFile(Request $request, Shop $shop)
    {
        //
    }
}