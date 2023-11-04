<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'notifiable_id',
        'notifiable_type',
        'userto_id',
        'userby_id',
        'read',
        'description'
    ];

    protected $casts = ['read' => 'boolean'];

    public function notifiable()
    {
        return $this->morphTo();
    }

    public function by()
    {
        return $this->belongsTo('App\Models\User', 'userby_id');
    }

    public function to()
    {
        return $this->belongsTo('App\Model\User', 'userto_id');
    }

    public function post()
    {
        if ($this->notifiable_type === 'App\Model\Post') {
            return (bool) $this->notifiable()->count();
        }
    }

    public function comment()
    {
        if ($this->notifiable_type === 'App\Model\Comment') {
            return (bool) $this->notifiable()->count();
        }
    }



    public function favourite()
    {
        if ($this->notifiable_type === 'App\Model\Favourite') {
            return (bool) $this->notifiable()->count();
        }
    }

    public function report()
    {
        if ($this->notifiable_type === 'App\Model\Report') {
            return (bool) $this->notifiable()->count();
        }
    }

    public function visitor()
    {
        if ($this->notifiable_type === 'App\Model\UserVisitor') {
            return (bool) $this->notifiable()->count();
        }
    }

    public function contact()
    {
        if ($this->notifiable_type === 'App\Model\UserContact') {
            return (bool) $this->notifiable()->count();
        }
    }

    public function proposal()
    {
        if ($this->notifiable_type === 'App\Model\UserProposal') {
            return (bool) $this->notifiable()->count();
        }
    }
}