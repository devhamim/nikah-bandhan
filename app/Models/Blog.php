<?php

namespace App\Models;

use Auth;
use Vnsdks\SlugGenerator\SlugGenerator;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function addedBy(){
		return $this->belongsTo('App\Models\User','addedby_id');
	}

	public function imgFeature()
	{
	    if($this->feature_img_name)
	    {
	        return true;
	    }else
	    {
	        return false;
	    }
	}

	public function fi()
	{
		if($this->imgFeature())
		{
			return "/storage/media/image/{$this->feature_img_name}";
		}
		else{
			return "img/fi.png";
		}
	}

	public function fiName()
	{
		if($this->imgFeature())
		{
			return $this->feature_img_name;
		}
		else{
			return "fi.png";
		}
	}

	// public function slug()
	// {
	// 	$generator = new SlugGenerator;

	// 	return $generator->generate($this->title);




	// }

	public function deletePermission()
   {
   		if(
   			$this->addedby_id == Auth::id()
   			|| Auth::user()->isAdmin()
   			|| Auth::user()->isBlogAdmin()

   			)
   			{
   				return true;
   			}
   			return false;
   }

	public function blogCategories()
	{
		return $this->belongsToMany('App\Models\BlogCategory', 'post_categories', 'post_id', 'category_id');
	}




	public function divisions()
	{
		return $this->belongsToMany('App\Models\Division', 'post_divisions', 'post_id', 'division_id');
	}

	public function districts()
	{
		return $this->belongsToMany('App\Models\District', 'post_districts', 'post_id', 'district_id');
	}

	public function thanas()
	{
		return $this->belongsToMany('App\Models\Upazila', 'post_thanas', 'post_id', 'thana_id');
	}

	public function cats(){
		$cats = '';
		if($this->blogCategories->count())
		{
			foreach($this->blogCategories as $cat){
				$cats .= $cat->title . ', ';
			}
		}
		return $cats;
	}

	public function div()
	{
		if($this->divisions->count())
		{
			$div = $this->divisions()->first();
			return $div->name;
		}
		return null;
	}

	public function dist()
	{
		if($this->districts->count())
		{
			$dist = $this->districts()->first();
			return $dist->name;
		}
		return null;
	}

	public function thana()
	{
		if($this->thanas->count())
		{
			$thana = $this->thanas()->first();
			return $thana->name;
		}
		return null;
	}

	public function comments()
	{
		return $this->hasMany('App\Models\Comment','post_id');
	}



}
