<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Image;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class CropImageUploadController extends Controller
{
    public function index()
    {
     return view('image-crop');
    }

    public function store(Request $request)
    {
        return $request->all();
        // return 1;
        // $folderPath = public_path('upload/');

        // return $folderPath;

        // $image_parts = explode(";base64,", $request->image);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        // $image_base64 = base64_decode($image_parts[1]);

        // $imageName = uniqid() . '.png';

        // $imageFullPath = $folderPath.$imageName;

        // file_put_contents($imageFullPath, $image_base64);

        $file = $request->img;
        $originalName = $file->getClientOriginalName();
        Storage::disk('upload')->put('hukkahua/' . $originalName, File::get($file));

         $saveFile = new Image;
         $saveFile->title = "hulu";
         $saveFile->save();

        return response()->json(['success'=>'Crop Image Saved/Uploaded Successfully using jQuery and Ajax In Laravel']);
    }
}
