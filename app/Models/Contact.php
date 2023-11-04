<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function newRequest()
    {
        return $this->where('seen_status', false)->get();
    }

    public function countUnseen()
    {
        return $this->newRequest()->count();
    }
}