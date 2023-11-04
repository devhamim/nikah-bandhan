<?php

namespace Cp\Chat\Model;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';

    protected $fillable = [
        'addedby_id'
    ];

    protected $casts = ['private' => 'boolean'];

    public function chatables()
    {
        return $this->hasMany('Cp\Chat\Model\Chatable','chat_id');
    }


    //https://github.com/musonza/chat/blob/master/src/Conversations/Conversation.php

    // public function users()
    // {
    //     return $this->morphedByMany('App\Model\User','chatable');
    // }

    // public function shops()
    // {
    //     return $this->morphedByMany('Cp\Smartshop\Model\Shop', 'chatable');
    // }

    // public function bazars()
    // {
    //     return $this->morphedByMany('Cp\Smartshop\Model\Bazar', 'chatable');
    // }

    // public function userFirst()
    // {
    //     return $this->users()
    //     ->where('users.id','<>',Auth::id())
    //     ->first();
    // }


}
