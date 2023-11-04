<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WpPostMeta extends Model
{
    use HasFactory;
    protected $connection= 'wpmysql';
    protected $table = 'wp48_postmeta';
    public $timestamps = false;


}
