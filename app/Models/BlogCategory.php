<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    public function posts(){
		return $this->belongsToMany('App\Models\Blog', 'post_categories', 'category_id', 'post_id');
	}

	public function hasPost($post){
		$row = $this->posts()->where('blogs.id',$post->id)->first();
		if($row){
			return true;
		}
		return false;
	}

	public function latestPost(){
		return $this->posts()->where('publish_status','published')->latest()->first();
	}


	public function latestPostForDate($date){
		return $this->posts()
		->where('publish_status','published')
		->whereDate('blogs.updated_at', '<=', $date)
		->latest()
		->first();
	}

	public function latestPosts()
	{
		return $this->posts()->where('publish_status','published')->latest()->paginate(6);
	}

	public function latestSomePosts($number)
	{
		return $this->posts()->where('publish_status','published')->latest()->paginate($number);
	}

	public function latestPostsForArchive($date)
	{
		return $this->posts()
		->where('publish_status','published')
		->whereDate('blogs.updated_at', '<=', $date)
		->latest()
		->paginate(6);
	}
    public function postCounts(){
        return $this->hasMany('App\Models\Blog','categories');
    }
    public function postCount(){
        return $this->postCounts()
        ->where('publish_status','published');

    }
}
