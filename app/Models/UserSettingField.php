<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSettingField extends Model
{
    protected $table = 'user_setting_fields';
    public function values()
    {
    	return $this->hasMany('App\Models\UserSettingItem', 'field_id');
    }

    public function hasValue()
    {
        if ($this->values->count()) {
            return true;
        }
        return false;
    }
}