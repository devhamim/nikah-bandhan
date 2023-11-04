<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Touch extends Model
{
    protected $table = 'touches';
    protected $fillable = [
        'user_id',
        'notify_type',  //shop,main,message,frtm
        'notify_value'
    ];
    public $timestamps = false;
}