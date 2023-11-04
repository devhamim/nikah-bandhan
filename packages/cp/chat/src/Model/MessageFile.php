<?php

namespace Cp\Chat\Model;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MessageFile extends Model
{
	use SoftDeletes;
	protected $table = 'message_files';
	protected $fillable = [
		'message_id',
		'file_name',
		'file_mime',
		'file_ext',
		'file_alt',
		'file_size',
		'file_type',
		'addedby_id',
    ];
	protected $dates = ['deleted_at'];

	public function addedBy()
	{
	  return $this->belongsTo('App\Model\User', 'addedby_id');
	}

	public function message()
	{
		return $this->belongsTo('Cp\Chat\Model\Message','message_id');
	}

	public function author(User $user)
  	{
    	return (bool) $this->addedBy()->where('id', $user->id)->count();
  	}

  //view //viewed //views
  public function views()
  {
    return $this->morphMany('App\Model\User\View', 'viewable');
  }

  public function viewsCount()
  {
    return $this->views->sum('total_views');
  }

  public function isViewed()
  {
    return (bool) $this->views()
    ->where('user_id',Auth::id())
    ->count();
  }

  	public function viewIncrease()
  	{
    	$v = $this->views()
    	->where('user_id', Auth::id())
    	->first();

    	if($v)
    	{
      		$v->total_views = $v->total_views + 1;
      		$v->save();
    	}else
    	{
      		$this->views()->where('user_id', Auth::id())
      		->create(['total_views' => 1, 'user_id' => Auth::id()]);
    	}
  	}
}
