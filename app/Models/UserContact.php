<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
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
}
