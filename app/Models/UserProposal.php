<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProposal extends Model
{
  use SoftDeletes;
  protected $casts = [

    'accepted' => 'boolean',
  ];

  public function user()
  {
    return $this->belongsTo('App\Models\User')->withoutGlobalScopes();
  }

  public function userSecond()
  {
    return $this->belongsTo('App\Models\User', 'user_second_id')->withoutGlobalScopes();
  }

  //notifications
  public function notifications()
  {
    return $this->morphMany('App\Models\Notification', 'notifiable');
  }



  public function userFrom()
  {
    return $this->belongsTo('App\Models\User', 'user_id');
  }
  public function userTo()
  {
    return $this->belongsTo('App\Models\User', 'user_second_id');
  }

}
