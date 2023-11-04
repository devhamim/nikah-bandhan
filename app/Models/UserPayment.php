<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withoutGlobalScopes();
    }

    public function addedBy()
    {
        return $this->belongsTo('App\Models\User', 'addedby_id')->withoutGlobalScopes();
    }

    public function package()
    {
        return $this->belongsTo('App\Models\MembershipPackage', 'membership_package_id');
    }
}