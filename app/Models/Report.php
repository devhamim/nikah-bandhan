<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function reportBy()
    {
        return $this->belongsTo('App\Models\User', 'user_id')->withoutGlobalScopes();
    }

    public function reportAbout()
    {
        return $this->belongsTo('App\Models\User', 'user_second_id')->withoutGlobalScopes();
    }
}
