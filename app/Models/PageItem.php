<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageItem extends Model
{
    public function page()
    {
        return $this->belongsTo('App\Models\Page', 'page_id');
    }
}