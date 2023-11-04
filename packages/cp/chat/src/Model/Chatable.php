<?php

namespace Cp\Chat\Model;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Chatable extends Model
{
    protected $table = 'chatables';

    protected $fillable = [
		'chatto_id',
		'chatto_type',
        'chatby_id',
        'chatby_type',
		'chat_id',
		'autoload',
		'box',
		'leaved',
        'addedby_id',
		'status' //regular //archive //unknown
    ];

    protected $casts = [
        'box' => 'boolean',
        'autoload' =>'boolean',
        'leaved' => 'boolean'
    ];

    public function chat()
    {
        return $this->belongsTo('Cp\Chat\Model\Chat','chat_id');
    }

    public function chatby()
    {
       return $this->morphTo();
        // return $this->morphMany();
    }

    public function chatto()
    {
        return $this->morphTo();
       // return $this->morphMany();
    }

    public function user()
    {
        return $this->chatby_type == 'App\Model\User' ? true : false;
    }

    public function shop()
    {
        return $this->chatby_type == 'Cp\Smartshop\Model\Shop' ? true : false;
    }

    public function bazar()
    {
        return $this->chatby_type == 'Cp\Smartshop\Model\Bazar' ? true : false;
    }

    public function publishes()
    {
        return $this->hasMany('Cp\Chat\Model\ChatPublish', 'chatable_id');
    }

    // public function getWallAttribute()
    // {
    //     return $this->publishedTo()
    //     ->orderBy('updated_at','desc')
    //     ->paginate(6);
    // }

    public function getChatBusAttribute()
    {
        $chatbus =  $this->publishes()
        ->orderBy('id','desc')
        ->paginate(6);
        $chatbus->setPath('all/messages/for/single/user/{chatable}');
        return $chatbus;
    }

    public function unseenCount()
    {
        return $this->publishes()->where('seen',0)->count();
    }

    public function latestMessage()
    {
        $p = $this->publishes()->orderBy('id','desc')->first();
        if($p->publishable)
        {
            if($p->message())
            {
                if($msg = $p->publishable)
                {
                    if($msg->message_body)
                    {
                        return $msg->message_body;
                    }                    
                }
            }
        }
    }

    public function latestMsgByMe()
    {
        $p = $this->publishes()->orderBy('id','desc')->first();
        if($p->publishable)
        {
            if($p->message())
            {
                if($msg = $p->publishable)
                {
                    if($msg->addedby_id == Auth::id())
                    {
                        return true;
                    }
                    return false;                   
                }
            }

        }
    }
}
