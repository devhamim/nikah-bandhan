<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $fillable=['name'];

    function cast() {
        return $this->hasMany(Cast::class);
      }
      public function userReigion2()
      {
        return $this->belongsTo(User::class, '');
      }
}
