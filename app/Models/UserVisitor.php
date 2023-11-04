<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserVisitor extends Model
{
  protected $fillable = [
    'user_id',
    'visitor_id',
    'visits'
  ];

  //notifications
  public function notifications()
  {
    return $this->morphMany('App\Models\Notification', 'notifiable');
  }

  public function userFrom()
  {
    return $this->belongsTo('App\Models\User', 'visitor_id');
  }
  public function userTo()
  {
    return $this->belongsTo('App\Models\User', 'user_second_id');
  }
}