<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertnerPreference extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function ppReligion()
    {
        // dd(1);
     return $this->belongsTo(Religion::class, 'religion');
    //  dd($ff);

    }
}
