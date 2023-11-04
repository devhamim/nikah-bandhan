<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{

    protected $fillable=['religion_id','name'];

    public function religion()
    {
     return $this->belongsTo(Religion::class);
    }
}
