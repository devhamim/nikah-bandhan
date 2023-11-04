<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WpPost extends Model
{
    use HasFactory;

    protected $connection= 'wpmysql';
    protected $table = 'wp48_posts';
    public $timestamps = false;

    public function updatedItems(){
         return $this->hasMany(WpPost::class,'post_parent','ID');
    }
    
    public function updatedOrOriginal(){
        $p = $this->updatedItems()->where('post_type','revision')
        ->where('post_status','inherit')->orderBy('ID','desc')->first();

        if(!$p){
            $p = WpPost::where('ID', $this->ID)->first();
        }

        return $p;
    }


    public function fi(){
         $p = WpPostMeta::where('post_id', $this->ID)->where('meta_key','_thumbnail_id')
         ->first();

         if($p && $p->meta_value){
             $img = WpPost::where('ID',$p->meta_value)->value('guid');
         }else{
            $img = 'post_img.jpg';
         }

         return $img;
    }

  
}
