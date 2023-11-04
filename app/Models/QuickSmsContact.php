<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuickSmsContact extends Model
{
  protected $table = 'quick_sms_contacts';

	protected $fillable = [
		'quick_sms_contact_bulk_id',
		'mobile'
  ];
}
