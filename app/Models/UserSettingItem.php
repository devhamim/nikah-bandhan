<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSettingItem extends Model
{
    public function field()
    {
        return $this->belongsTo('App\Model\UserSettingField');
    }


    protected $fillable = [
        'title',


    ];

}
