<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickSmsContactBulk extends Model
{
  protected $table = 'quick_sms_contact_bulks';

	protected $fillable = [
		'sent_from',
		'addedby_id',
		'message'
  ];

  public function contacts()
  {
  	return $this->hasMany('App\Models\QuickSmsContact', 'quick_sms_contact_bulk_id');
  }
}
