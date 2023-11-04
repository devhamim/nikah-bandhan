<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPicture extends Model
{
    protected $fillable = [
        'image_name',
        'image_mime',
        'image_ext',
        'image_alt',
        'image_size',
        'image_width',
        'image_height',
        'editedby_id',
        'image_type', //coverpic, profilepic, privatepic
        'autoload'
    ];

    protected $casts = ['autoload' => 'boolean'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    
}
