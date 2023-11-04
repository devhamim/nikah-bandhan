<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuccessProfile extends Model
{

	use SoftDeletes;

	public function imgFeature()
	{
	    if($this->image_name)
	    {
	        return true;
	    }else
	    {
	        return false;
	    }
	}
    public function fiName()
    {
        if($this->imgFeature())
		{
			return $this->image_name;
		}
		else{
            return "fi.png";

       }

}
}
