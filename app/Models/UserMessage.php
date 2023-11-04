<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    protected $fillable = [

        'userfrom_id',
        'userto_id',
        'message',
        'read',
        'last',
    ];
    public function userFrom()
    {
        return $this->belongsTo('App\Models\User', 'userfrom_id');
    }
    public function userTo()
    {
        return $this->belongsTo('App\Models\User', 'userto_id');
    }
}