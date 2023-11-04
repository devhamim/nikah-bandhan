<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class MediaController extends Controller
{
    public function index(){
        menuSubmenu('mediaM', 'mediaSM');
        $data['medias'] = Media::latest()->get();
        return view('admin.media.index',$data);
    }

    public function store(Request $request){

        $mediaInfo = [];

         $request->validate([
              'file_name' => ['required'],
         ]);

        if($request->hasFile('file_name')){
            $file         = $request->file('file_name');
            $file_ext     = $file->getClientOriginalExtension();
            $file_name    = date('ymdhis').'.'.$file_ext;
            $file->storeAs('media_images', $file_name,'public');
        }else{
            $file_name =  null;
        }


        if(in_array($file_ext, Media::SUPPORTED_IMAGE_TYPES)){
            $mediaInfo['file_type'] = "image";
            $image = Image::make($file);

            $mediaInfo['height'] = $image->getHeight();
            $mediaInfo['width']  = $image->getWidth();
        }

        else if(in_array($file_ext, Media::SUPPORTED_VIDEO_TYPES)){
            $mediaInfo['file_type'] = "video";
        }

        else{
            $mediaInfo['file_type'] = "others";
        }

        $mediaInfo['size'] = human_filesize($file->getSize());
        $mediaInfo['file_name']   =  $file_name;
        $mediaInfo['file_ext']    =  $file_ext;
        $mediaInfo['addedby_id']  =  Auth::id();

        Media::create($mediaInfo);
        menuSubmenu('mediaM', 'mediaSM');
        Session::flash('success', 'Image Upload Successfully');

        return redirect()->back();
    }

    public function destroy($id){
        $media = Media::find($id);
        if ($media->file_name) {
            Storage::delete('public/media_images/'.$media->file_name);
        }
        $media->delete();
        menuSubmenu('mediaM', 'mediaSM');
        return redirect()->back();
    }


    public function getMediasAjax()
    {
        $paginate = 20;
        $medias = Media::latest()->paginate($paginate);
        $html = view('admin.media.mediaAjax', ['medias' => $medias]);
        return response()->json( $html->render());
    }
}
