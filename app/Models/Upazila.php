<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    public function posts(){
		return $this->belongsToMany('App\Models\Blog', 'post_thanas', 'thana_id', 'post_id');
	}

	public function hasPost($post){
		$row = $this->posts()->where('posts.id',$post->id)->first();
		if($row){
			return true;
		}
		return false;
	}

	public function division(){
		return $this->belongsTo('App\Models\Division', 'division_id');
	}

	public function district(){
		return $this->belongsTo('App\Models\District', 'district_id');
	}
}
