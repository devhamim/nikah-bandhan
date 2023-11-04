<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function items()
    {
        return $this->hasMany('App\Models\PageItem', 'page_id');
    }

    public function activeItems()
    {
        return $this->items()->where('active', true)->get();
    }
}