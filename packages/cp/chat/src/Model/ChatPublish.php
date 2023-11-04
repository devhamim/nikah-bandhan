<?php

namespace Cp\Chat\Model;

use Illuminate\Database\Eloquent\Model;

class ChatPublish extends Model
{
    protected $table = 'chat_publishes';

    protected $fillable = [
        // 'publishable_id',
        // 'publishable_type',
        'chatable_id',
        'publishedby_id',
        'publishedby_type',
        // 'publishedto_id',
        // 'publishedto_type',
        'seen',
    ];

    protected $casts = [
        'seen' => 'boolean',
    ];


    //chatable
    public function chatable()
    {
       return $this->belongsTo('Cp\Chat\Model\Catable','chatable_id');
    }

    public function publishable()
    {
       return $this->morphTo();
    }

    public function message() //publishable
    {
        if($this->publishable_type === 'Cp\Chat\Model\Message')
        {
            return (bool) $this->publishable()->count();
        }
    }

    public function post()  //publishable
    {
        if($this->publishable_type === 'App\Model\Post')
        {
            return (bool) $this->publishable()->count();
        }
    }

    public function user() //publishable
    {
        if($this->publishable_type === 'App\Model\User')
        {
            return (bool) $this->publishable()->count();
        }
    }

    public function spread() //publishable
    {
        if($this->publishable_type === 'App\Model\Spread')
        {
            return (bool) $this->publishable()->count();
        }
    }

    public function product()  //publishable
    {
        if($this->publishable_type === 'Cp\Smartshop\Model\Product')
        {
            return (bool) $this->publishable()->count();
        }
    }


    public function publishedby()
    {
       return $this->morphTo();
    }

    // public function publishedto()
    // {
    //    return $this->morphMany();
    // }
    public function seen()
    {
        if($this->seen == false)
        {
            $this->seen = true;
            $this->save();
        }
        
    }
}
