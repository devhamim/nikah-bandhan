<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
  protected $fillable = [
    'user_id',
    'user_second_id'

  ];

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