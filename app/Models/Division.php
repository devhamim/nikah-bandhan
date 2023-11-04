<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
 	public function posts(){
		return $this->belongsToMany('App\Models\Blog', 'post_divisions', 'division_id', 'post_id');
	}

	public function hasPost($post){
		$row = $this->posts()->where('blogs.id',$post->id)->first();
		if($row){
			return true;
		}
		return false;
	}

	public function districts()
	{
		return $this->hasMany('App\Models\District','division_id');
	}

	public function thanas()
	{
		return $this->hasMany('App\Models\Upazila','division_id');
	}
}
