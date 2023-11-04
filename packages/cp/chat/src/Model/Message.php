<?php

namespace Cp\Chat\Model;

use App\Model\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
    'chat_id',
    'message_title',
		'message_slug',
		'message_body',
		'addedby_id',
		'editedby_id',
		'message_status' //temp draft publish
    ];

    protected $dates = ['deleted_at'];

    public function setMessageSlugAttribute($value)
  {

    if($value)
    {
      $this->attributes['message_slug'] = $value;
    }
    else
    {
      $this->attributes['message_slug'] = custom_slug($this->attributes['message_body']);
    }
  }

  public function setMessageTitleAttribute($value)
  {

    if($value)
    {
      $this->attributes['message_title'] = $value;
    }
    else
    {
      $this->attributes['message_title'] = substr($this->attributes['message_body'],0,100);
    }
  }

  public function chat()
  {
      return $this->belongsTo('Cp\Chat\Model\Chat','chat_id');
  }

  //user
  public function addedBy()
  {
    return $this->belongsTo('App\Model\User', 'addedby_id');
  }
  public function editedBy()
  {
    return $this->belongsToMany('App\Model\User', 'editedby_id');
  }

  public function author(User $user)
  {
    return (bool) $this->addedBy()->where('id', $user->id)->count();
  }

  //publish
  public function publish()
  {
    return $this->morphMany('Cp\Chat\Model\ChatPublish', 'publishable');
  }

  //likes
  public function likes()
  {
    return $this->morphMany('App\Model\Like', 'likeable');
  }

  public function getTenLikesAttribute()
  {
    return $this->likes()->take(10)->latest()->get()->reverse();
  }

  public function getAllLikesAttribute()
  {
    $likes =  $this->likes()->paginate(4);
    // $likes->setPath('likes/for/post/auto/{post?}');
    return $likes;
  }

  public function choiceFive()
  {
    return $this->likes()->where('choice', '<=', 5)->count();
  }

  public function choiceFour()
  {
    return $this->likes()->whereBetween('choice', [6,25])->count();
  }

  public function choiceThree()
  {
    return $this->likes()->whereBetween('choice', [26,50])->count();
  }
  public function choiceTwo()
  {
    return $this->likes()->whereBetween('choice', [51,75])->count();
  }

  public function choiceOne()
  {
    return $this->likes()->where('choice', '>', 75)->count();
  }

  //notifications
  public function notification()
  {
    return $this->morphMany('App\Model\Lists\Notification', 'notifiable');
  }

  //view //viewed //views
  public function views()
  {
      return $this->morphMany('App\Model\User\View', 'viewable');
  }

  public function viewsCount()
  {
    return $this->views->sum('total_views');
  }

  public function isViewed()
  {
    return (bool) $this->views()
    ->where('user_id',Auth::id())
    ->count();
  }

  public function viewIncrease()
  {
    $v = $this->views()
    ->where('user_id', Auth::id())
    ->first();

    if($v)
    {
      $v->total_views = $v->total_views + 1;
      $v->save();
    }else
    {
      $this->views()->where('user_id', Auth::id())
      ->create(['total_views' => 1, 'user_id' => Auth::id()]);
    }
  }

  //files //file //audio //video //pdf //image
  public function files()
  {
    return $this->hasMany('Cp\Chat\Model\MessageFile','message_id');
  }

  public function hasImage()
  {
    return (bool) $this->images()->count();
  }

  public function images()
  {
    return $this->files()->where('file_type','image')->get();
  }

  public function hasVideo()
  {
    return (bool) $this->videos()->count();
  }

  public function videos()
  {
    return $this->files()->where('file_type','video')->get();
  }

  public function hasAudio()
  {
    return (bool) $this->audios()->count();
  }

  public function audios()
  {
    return $this->files()->where('file_type','audio')->get();
  }

  public function hasPdf()
  {
    return (bool) $this->pdfs()->count();
  }

  public function pdfs()
  {
    return $this->files()->where('file_type','pdf')->get();
  }

  public function hasMedia()
  {
    return (bool) $this->files()->count();
  }

}
