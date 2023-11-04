<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'addedby_id',
        'editedby_id',
        'description'

    ];

    public function logAddedBy()
    {
        return $this->belongsTo('App\Models\User', 'addedby_id');

    }

}
