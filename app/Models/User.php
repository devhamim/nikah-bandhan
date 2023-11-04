<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cp\Chat\Models\Chatable;
use App\Scopes\ActiveScope;
use App\Models\PertnerPreference;
use Illuminate\Notifications\Notifiable;
use App\Models\QuickSmsContactBulk;

use DB;
use Mail;
use GuzzleHttp\Client;
use Auth;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'user_type',
        'password_temp',
        'username',
        'active'
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope(new ActiveScope);
    //     //'active = 1'
    // }

    public function fiName(){
        if($this->profile_img){
         return  $this->profile_img;
        }else{
            return "user.png";
        }
    }

    public function selectedName()
    {
        return $this->name;
    }

    public function latestMsgUser()
    {
        $msg = UserMessage::where('last', 1)
            ->where(function ($f) {
                $f->where('userfrom_id', $this->id);
                $f->orWhere('userto_id', $this->id);
            })
            ->orderBy('id', 'desc')
            ->first();

        if ($msg) {
            if ($msg->userfrom_id != $this->id) {
                $user = User::where('id', $msg->userfrom_id)->first();
            } else {
                $user = User::where('id', $msg->userto_id)->first();
            }
        } else {
            $user = null;
        }

        return $user;
    }

    public function unreadMsgUsersCount()
    {
        return UserMessage::where('userto_id', $this->id)
            ->where('read', 0)->where('last', 1)->count();
    }

    public function pertnerPreference()
    {
        return $this->hasOne('App\Models\PertnerPreference');
    }

    public function messageContacts()
    {
        $contacts = UserMessage::where('last', 1)
            ->where(function ($f) {
                $f->where('userfrom_id', $this->id);
                $f->orWhere('userto_id', $this->id);
            })
            ->orderBy('id', 'desc')
            ->paginate(400);
        return $contacts;
    }


    public function pendingProposalContacts()
    {
        $proposalcontacts = UserProposal::where('accepted', false)->where(function ($f) {
            $f->Where('user_second_id', $this->id);
        })
            ->orderBy('id', 'desc')
            ->paginate(400);
        return $proposalcontacts;
    }

    public function approvedProposalContacts()
    {
        $proposalcontacts = UserProposal::where('accepted', true)->where(function ($f) {
            $f->Where('user_second_id', $this->id)->orWhere('user_id', $this->id);
        })
            ->orderBy('id', 'desc')
            ->paginate(400);
        return $proposalcontacts;
    }


    public function aaa()
    {
        $proposalcontacts = UserProposal::where('accepted', true)->where(function ($f) {
            $f->Where('user_second_id', $this->id)->orWhere('user_id', $this->id);
        })
            ->orderBy('id', 'desc')
            ->paginate(400);
        return $proposalcontacts;
    }



    public function favouriteContacts()
    {
        $favourite = Favourite::where(function ($f) {
            $f->Where('user_id', $this->id);
        })
            ->orderBy('id', 'desc')
            ->paginate(400);
            // dd($favourite);
        return $favourite;
    }


    public function visitorcontacts()
    {
        $favourite = UserVisitor::where(function ($f) {
            $f->Where('user_id', $this->id);
        })
            ->orderBy('id', 'desc')
            ->paginate(400);
        return $favourite;
    }

    public function readMsgOf($user)
    {
        UserMessage::where([
            ['userto_id', '=', $this->id],
            ['userfrom_id', '=',  $user->id]
        ])->update(['read' => 1]);
    }

    public function pp()
    {
        if ($this->profile_img) {
            return 'storage/users/pp/' . $this->profile_img;
        } else {

            return 'img/vip-user.png';
        }
    }

    public function validity_10_count()
    {
        return User::where('expired_at', '>=', Carbon::now())
            ->where('expired_at', '<', Carbon::now()->addDays(10))->count();
    }
    public function free_pack_count()
    {
        return User::where('package', 0)
            ->where('expired_at', '>=', Carbon::now())
            ->where('expired_at', '<', Carbon::now()->addDays(14))->count();
    }

    public function favs()
    {
        return $this->belongsToMany('App\Models\User', 'favourites', 'user_id', 'user_second_id')
            ->withTimestamps()
            ->whereDoesntHave('blockerOf', function ($query) {
                $query->where('user_id', $this->id);
            })
            ->whereDoesntHave('blockss', function ($qq) {
                $qq->where('user_second_id', $this->id);
            })
            // ->whereHas('userPictures', function ($query) {
            //     $query->where('image_type', 'profilepic');
            //     $query->where('checked', true);
            //   })
            ->orderBy('pivot_updated_at', 'desc');
    }

    public function countLogs()
    {
        return $this->hasMany('App\Models\Log', 'user_id')->count();
    }
    public function countLogsName()
    {
        return $this->hasMany('App\Models\Log', 'user_id');
    }
    public function lastLogedName($id)
    {
        // return $id;
        return $this->where('id',$id)->name;
    }
    public function lastLogsName()
    {
        return $this->countLogsName()->orderBy('created_at','desc')->first();
    }

    public function userGallery()
    {
        return $this->hasMany(Gallery::class,'user_id');
    }

    public function userGallery6()
    {
        return $this->userGallery()->latest()->paginate(6);
    }



    public function countLog()
    {
        $countLog = Log::where(function ($f) {
            $f->Where('user_id', $this->id);
        })->count();
        return $countLog;
    }

    public function log()
    {
        return $this->hasMany(Log::class,'user_id');
    }

    public function firstLog()
    {
        $log= $this->log()->first();
        return $log;
    }

    // public function hasLog()
    // {
        // $countLog = Log::where(function ($f) {
        //     $f->Where('user_id', $this->id);
        // })->count();
        // if($countLog>0)
        // {
        //     return true;
        // }
        // $ids=User::pluck('id');
        // $users=Log::whereIn('user_id', $ids)->get();
        // return $users;
    // }

    public function hasLog()
    {
        return $this->log()->count();
    }

    public function blockerOf()
    {
        return $this->belongsToMany('App\Models\User', 'blocks', 'user_second_id', 'user_id')
            // ->whereHas('userPictures', function ($query) {
            //     $query->where('image_type', 'profilepic');
            //     $query->where('checked', true);
            //   })
            ->withTimestamps()
            ->orderBy('pivot_updated_at', 'desc');
    }

    public function blockss()
    {
        return $this->belongsToMany('App\Models\User', 'blocks', 'user_id', 'user_second_id')
            // ->whereHas('userPictures', function ($query) {
            //     $query->where('image_type', 'profilepic');
            //     $query->where('checked', true);
            //   })
            ->withTimestamps()
            ->orderBy('pivot_updated_at', 'desc');
    }

    public function pendingProposalToMe()
    {
        return UserProposal::where('deleted_at', null)->has('user')->has('userSecond')->where('accepted', false)->where('user_second_id', $this->id)->latest()->paginate(24);
    }

    public function proposalToMe()
    {
        return $this->hasMany('App\Models\UserProposal', 'user_second_id');
    }

    public function proposalByMe()
    {
        return $this->hasMany('App\Models\UserProposal', 'user_id');
    }

    public function pendingProposalToMeCount()
    {
        return UserProposal::where('deleted_at', null)->has('user')->has('userSecond')->where('accepted', false)->where('user_second_id', $this->id)->count();
    }



    public function acceptedProposalToMeCount()
    {
        return UserProposal::where('deleted_at', null)->has('user')->has('userSecond')->where('accepted', true)->where('user_second_id', $this->id)->count();
    }

    public function messageWithUser($userto)
    {
        $messages = UserMessage::where([
            ['userto_id', '=', $userto->id],
            ['userfrom_id', '=',  $this->id]
        ])->orWhere([
            ['userto_id', '=', $this->id],
            ['userfrom_id', '=',  $userto->id]
        ])

            ->paginate(400);

        return $messages;
    }
    public function touchesAll()
    {
        return $this->hasMany('App\Models\Touch', 'user_id');
    }
    public function favourites()
    {
        return $this->hasMany('App\Models\Favourite');
    }
    public function isMyFavourite(User $user)
    {
        return (bool) $this->favourites()
            ->where('user_second_id', $user->id)
            ->count();
    }

    public function makeFavourite(User $user)
    {
        if (!$this->isMyFavourite($user)) {
            return $this->favourites()
                ->create(['user_second_id' => $user->id]);
        }
    }




    public function touchMainsIncrement()
    {
        $record = $this->touchesAll()->where('notify_type', 'main')->firstOrCreate(['notify_type' => 'main']);
        $record->notify_value = $record->notify_value + 1;
        $record->save();
        return $record;
    }
    public function touchMainsDecrement()
    {
        $record = $this->touchesAll()->where('notify_type', 'main')->firstOrCreate(['notify_type' => 'main']);
        if ($record->notify_value) {
            $record->notify_value = $record->notify_value - 1;
            $record->save();
        }

        return $record;
    }

    public function makeUnfavourite(User $user)
    {
        if ($this->isMyFavourite($user)) {

            $user->touchMainsDecrement();
            $f = $this->favourites()->where('user_second_id', $user->id)->first();
            $ntfy = $f->notifications()->delete();
            return $f->delete();
        }
    }


    public function iAmVisitedBy(User $user)
    {
        if ($user->id !== $this->id) {
            $v = $this->userVis()->where('visitor_id', $user->id)->first();
            if ($v) {
                // $this->visitors()->updateExistingPivot($user->id, ['visits'=> $v->pivot->visits +1]);
                $v->visits++;
                $v->updated_at = Carbon::now();
                $v->save();
            } else {
                // $v = $this->visitors()->attach($user, ['visits' => 1]);

                $v = $this->userVis()->create([
                    'visits' => 1,
                    'visitor_id' => $user->id
                ]);

                $this->touchMainsIncrement();
                $ntfy = $v->notifications()->create([
                    'userto_id' => $this->id,
                    'userby_id' => $user->id,
                    'description' => 'created',
                ]);
            }

            return $v;
        }

        return true;
    }


    public function userVis()
    {
        return $this->hasMany('App\Models\UserVisitor', 'user_id');
    }

    public function visitors()
    {
        return $this->belongsToMany('App\Models\User', 'user_visitors', 'user_id', 'visitor_id')
            ->withPivot(['visits', 'updated_at'])
            ->whereDoesntHave('blockerOf', function ($query) {
                $query->where('user_id', $this->id);
            })
            ->whereDoesntHave('blockss', function ($qq) {
                $qq->where('user_second_id', $this->id);
            })
            // ->whereHas('userPictures', function ($query) {
            //     $query->where('image_type', 'profilepic');
            //     $query->where('checked', true);
            //   })
            ->withTimestamps()

            ->where('users.active', '=', 1)



            ->orderBy('pivot_updated_at', 'desc');

    }

    public function isPaidAndValidate()
    {
        if ($this->expired_at and ($this->package > 0)) {
            if (date('Y-m-d', strtotime(Carbon::parse($this->expired_at)->addDays()))  >= date('Y-m-d', strtotime(Carbon::now()))) {
                return true;
            }
        }

        return false;
    }


    public function isConnected()
    {
        return (bool) UserProposal::where(function($qq){
            $qq->where([
                'user_id' => Auth::id(),
                'user_second_id' => $this->id,
                'accepted' => true
            ]);
        })
        ->orWhere(function ($qqq){
            $qqq->where([
                'user_id' => $this->id,
                'user_second_id' => Auth::id(),
                'accepted' => true
            ]);
        })
        ->count();
    }


    public function pendingOther()
    {

        return  UserProposal::where(function($qq){
            $qq->where([
                'user_id' => $this->id,
                'user_second_id' => Auth::id(),
                'accepted' => false
            ]);
        })
        ->first();
    }




    public function pendingMy()
    {

        return  UserProposal::where(function($qq){
            $qq->where([
                'user_id' => Auth::id(),
                'user_second_id' => $this->id,
                'accepted' => false
            ]);
        })
        ->first();
    }





    public function isPending()
    {
        return (bool) UserProposal::where(function($qq){
            $qq->where([
                'user_id' => $this->id,
                'user_second_id' => Auth::id(),
                'accepted' => false
            ]);
        })
        ->count();
    }


    public function isMyPending()
    {
        return (bool) UserProposal::where(function($qq){
            $qq->where([
                'user_id' => Auth::id(),
                'user_second_id' => $this->id,
                'accepted' => false
            ]);
        })
        ->count();
    }




    public function isValidate()
    {
        if ($this->expired_at) {
            if (date('Y-m-d', strtotime(Carbon::parse($this->expired_at)->addDays()))  >= date('Y-m-d', strtotime(Carbon::now()))) {
                return true;
            }
        }


        return false;
    }

    public function age()
    {
        return Carbon::parse($this->dob)->diffInYears(Carbon::now());
    }

    public function profilePoint()
    {
        $p=0;

        if($this->name!=null)
        {
            $p=$p+5;
        }


        if($this->gender!=null)
        {
            $p=$p+5;
        }

        if($this->dob!=null)
        {
            $p=$p+5;
        }

        if($this->profile_img!=null)
        {
            $p=$p+10;
        }


        if($this->religion!=null)
        {
            $p=$p+5;
        }


        if($this->profession!=null)
        {
            $p=$p+5;
        }

        if($this->marital_status!=null)
        {
            $p=$p+5;
        }


        if($this->present_district!=null && $this->present_thana!=null)
        {
            $p=$p+5;
        }


        if($this->parmanent_thana!=null && $this->parmanent_district!=null)
        {
            $p=$p+5;
        }

        if($this->designation!=null)
        {
            $p=$p+5;
        }


        if($this->skin_color!=null)
        {
            $p=$p+5;
        }


        if($this->family_value!=null)
        {
            $p=$p+5;
        }


        if($this->disability!=null)
        {
            $p=$p+5;
        }


        if($this->pertnerPreference)
        {
            $p=$p+15;
        }


        if ($this->visitors()->count()) {
            // $p = $p + 5;
        }

        //100

        return $p;
    }

    public function proposalFromMeCount()
    {
        return UserProposal::where('accepted', false)->has('user')->has('userSecond')->where('user_id', $this->id)->count();
    }


    public function ProposalFromMe()
    {
        return UserProposal::where('accepted', false)->has('user')->has('userSecond')->where('user_id', $this->id)->latest()->paginate(24);
    }

    public function cont()
    {
        return $this->belongsToMany('App\Models\User', 'user_contacts', 'user_id', 'user_second_id')
            ->withTimestamps()
            ->whereDoesntHave('blockerOf', function ($query) {
                $query->where('user_id', $this->id);
            })
            ->whereDoesntHave('blockss', function ($qq) {
                $qq->where('user_second_id', $this->id);
            })
            ->orderBy('pivot_updated_at', 'desc');
    }

    public function packageDuration()
    {
        if ($this->expired_at < Carbon::now()) {
            return 0;
        } else {

            return Carbon::parse($this->expired_at)->diffInDays(Carbon::now()) + 1;
        }
    }

    public function proposal()
    {
        return $this->hasMany('App\Models\UserProposal');
    }

    public function memPackage()
    {
        return $this->belongsTo('App\Models\MembershipPackage', 'package');
    }
    public function contactLimit()
    {
        // dd( $this->cont()->count());
        if ($this->isPaidAndValidate()) {
            $a = $this->memPackage->contact_view_limit - $this->cont()->count();
            if ($a > 0) {
                return $a;
            }
        }
        return 0;
    }

    public function todayProposalCount()
    {
        return $this->proposal()
            ->whereDate('created_at', date('Y-m-d'))
            ->count();
    }

    public function dailyProposalSendingLimit()
    {
        if (($this->package > 0) and ($this->packageDuration() > 0)) {
            return $this->memPackage->proposal_send_daily_limit;
        } else {
            return 3;
        }
    }

    public function dailyProposalLimitCompleted()
    {
        if ($this->todayProposalCount() >= $this->dailyProposalSendingLimit()) {
            return true;
        }
        return false;
    }

    public function totalProposalSendingLimit()
    {

        if (($this->package > 0) and ($this->packageDuration() > 0)) {
            return $this->memPackage->proposal_send_total_limit;
        } else {
            return 15;
        }
    }

    public function totalProposalLimitCompleted()
    {
        if ($this->proposal()->count() >= $this->totalProposalSendingLimit()) {
            return true;
        }
        return false;
    }

    public function isOffline()
    {
        return $this->user_type == 'offline' ? true : false;
    }

    public function isAdmin()
    {

        if ($this->roles()->where('name', 'Admin')->first()) {
            return true;
        } else {
            return false;
        }
    }


    public function isBlockedByMe(User $user)
    {
        return (bool) $this->blocks()
            ->where('user_second_id', $user->id)
            ->count();
    }

    public function blocks()
    {
        return $this->hasMany('App\Models\Block');
    }

    public function himOrHer()
    {
        if ($this->gender == 'Male') {
            return 'Him';
        } else {
            return 'Her';
        }
    }


    public function blockThisUser(User $user)
    {
        if (!$this->isBlockedByMe($user)) {
            return $this->blocks()
                ->create(['user_second_id' => $user->id]);
        }
    }

    public function unblockThisUser(User $user)
    {
        if ($this->isBlockedByMe($user)) {
            return $this->blocks()->where('user_second_id', $user->id)->delete();
        }
    }



    public function myRelatedUsers($type)
    {
        if ($type == 'visitor') {
            return $this->visitors()
                // ->whereDoesntHave('blockerOf',function($query){
                //     $query->where('user_id', $this->id);
                // })
                //   ->whereHas('userPictures', function ($query) {
                //   $query->where('image_type', 'profilepic');
                //   $query->where('checked', true);
                // })
                ->paginate(24);
        } elseif ($type == 'contacts') {

            return $this->myContacts()
                // ->whereDoesntHave('blockerOf',function($query){
                //     $query->where('user_id', $this->id);
                // })
                //   ->whereHas('userPictures', function ($query) {
                //   $query->where('image_type', 'profilepic');
                //   $query->where('checked', true);
                // })
                ->paginate(24);
        } elseif ($type == 'block') {
            return $this->blockss()->paginate(24);
        }

        if ($type == 'preference') {
            return $this->searchPreferenceUsers(24);
        }

        if ($type == 'automail') {
            return $this->searchPreferenceAutomailUsers()
                ->paginate(4);
        }

        if ($type == 'featured') {
            return User::where('featured', true)->where('gender', $this->oltGender())->paginate(24);
        } else {
            return $this->favs()
                // ->whereDoesntHave('blockerOf',function($query){
                //     $query->where('user_id', $this->id);
                // })
                //   ->whereHas('userPictures', function ($query) {
                //   $query->where('image_type', 'profilepic');
                //   $query->where('checked', true);
                // })
                ->paginate(24);
        }
    }

    public function contacts()
    {
        return $this->hasMany('App\Models\UserContact');
    }


    public function isMyContact(User $user)
    {
        return (bool) $this->contacts()
            ->where('user_second_id', $user->id)
            ->count();
    }

    public function makeContact(User $user)
    {
        if (!$this->isMyContact($user)) {
            return $this->contacts()
                ->create(['user_second_id' => $user->id]);
        }
    }


    public function myContacts()
    {
        return $this->belongsToMany('App\Models\User', 'user_contacts', 'user_id', 'user_second_id')
            ->withPivot(['accepted', 'updated_at'])
            ->whereDoesntHave('blockerOf', function ($query) {
                $query->where('user_id', $this->id);
            })
            ->whereDoesntHave('blockss', function ($qq) {
                $qq->where('user_second_id', $this->id);
            })
            ->withTimestamps()
            ->orderBy('pivot_updated_at', 'desc');
    }

    public function checkContactUser()
    {
        return $this->hasOne('App\Models\UserContact','user_id');
    }
    public function checkContactUserPack($id)
    {
        return $this->checkContactUser()->where('user_second_id',$id)->count();
    }

    public function final_check_pending_count()
    {
        return User::where('final_check', false)->count();
    }

    public function pendingPaymentCount()
    {
        return UserPayment::where('status', 'pending')->count();
    }

    public function proposals_unchecked_count()
    {
        return UserProposal::has('user')->has('userSecond')->where('checked', false)->count();
    }

    public function proposalToMeCount()
    {
        return UserProposal::where('deleted_at', null)->has('user')->has('userSecond')->where('accepted', true)->where('user_second_id', $this->id)->count();
    }

    public function latestCheckedPP()
    {
        // $pp =  $this->userPictures()->where([
        //     'checked'=>true,
        //     'image_type'=>'profilepic'
        //     ])->orderBy('id', 'desc')->first();
        // // return $pp;
        // if($pp)
        // {
        //     return 'storage/users/pp/'.$pp->image_name;
        // }
        // else
        // {
        //     return $this->pp();
        // }
        if($this->img_name != null)
        {
            return 'storage/users/pp/'.$this->img_name;
        }
        else
        {
            return $this->pp();
        }
    }




    public function sendCustomSmsToUser($msg)
    {
        $to = bdMobile($this->mobile);

        if (strlen($to) != 13) {
            return true;
        }

        // $masking = smsMaskingCode();
        // $apiKey = smsApiKey();
        $msg = 'Dear user, vipmarriagemedia.com matching your partner with 100% guarantee. You can get any membership package and enjoy our features. Thank you.'; //149 characters here

        $url = smsUrl($to, $msg);

        // $url = "http://connect.primesoftbd.com/smsapi/non-masking?api_key={$apiKey}&smsType=text&mobileNo={$to}&smsContent={$msg}";
        // $url = "http://connect.primesoftbd.com/smsapi/masking?api_key={$apiKey}&smsType=text&maskingID={$masking}&mobileNo={$to}&smsContent={$msg}";
        $client = new Client();

        try {
            $r = $client->request('GET', $url);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
        } catch (\GuzzleHttp\Exception\ClientException $e) {
        }
    }
    //sms end


    public function smsDraftBulks()
    {
      return QuickSmsContactBulk::where('status','draft')->latest()->paginate(4);
    }

    public function quickSmsBulks()
    {
      return QuickSmsContactBulk::where('status','sent')->latest()->paginate(4);
    }


    public function sendSmsWithMessage($text)
    {
        ########### mobile sms start here ############

        $to = bdMobile($this->mobile);

        if(strlen($to) != 13)
        {
            return true;
        }

        $masking = smsMaskingCode();
        $apiKey = smsApiKey();
        $msg = str_limit($text,156,'..');

        $url = "http://connect.primesoftbd.com/smsapi/non-masking?api_key={$apiKey}&smsType=text&mobileNo={$to}&smsContent={$msg}";
        // $url = "http://connect.primesoftbd.com/smsapi/masking?api_key={$apiKey}&smsType=text&maskingID={$masking}&mobileNo={$to}&smsContent={$msg}";
        $client = new Client();

        try {
                $r = $client->request('GET', $url);
            } catch (\GuzzleHttp\Exception\ConnectException $e) {
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }

        ########### mobile sms end here ############
    }


    public function userReligion()
    {
        // dd(1);
     return $this->belongsTo(Religion::class, 'religion');
    //  dd($ff);

    }


    public function userCaste()
    {
        // dd(1);
     return $this->belongsTo(Cast::class, 'caste');
    //  dd($ff);

    }

    public function userParmanentDistrict()
    {
        // dd(1);
     return $this->belongsTo(District::class, 'parmanent_district');
    //  dd($ff);

    }

    public function userPresentDistrict()
    {
        // dd(1);
     return $this->belongsTo(District::class, 'present_district');
    //  dd($ff);

    }


    public function userParmanentDivision()
    {
        // dd(1);
     return $this->belongsTo(Division::class, 'parmanent_division');
    //  dd($ff);

    }

    public function userPresentDivision()
    {
        // dd(1);
     return $this->belongsTo(Division::class, 'present_division');
    //  dd($ff);

    }

    public function userParmanentThana()
    {
        // dd(1);
     return $this->belongsTo(Upazila::class, 'parmanent_thana');
    //  dd($ff);

    }

    public function userPresentThana()
    {
        // dd(1);
     return $this->belongsTo(Upazila::class, 'present_thana');
    //  dd($ff);

    }



  public function sendEmailWithMessage($text)
  {
      ########### email start here ############
      if (env('APP_ENV') == 'production')
      {
          $userName = $this->name;
          Mail::send('emails.notify.to_user', ['userName' => $userName, 'text'=> $text], function ($message) use ($userName, $text) {

              // $message->from(senderMails(), 'Taslima Marriage Media Message');

              $message->to($this->email, $this->name)
              ->subject('Taslima Marriage Media Message');
          });
          return true;
      }



      ########### email end here ############
  }


  public function isOnline()
  {
      if($this->loggedin_at)
      {
          $d = $this->loggedin_at->diffInMinutes(Carbon::now());

          if ($d < 4) {
              return true;
          }
      }


      return false;
  }

  public function fileIsImage()
  {
      if (
          $this->file_ext == 'jpg' or
          $this->file_ext == 'jpeg' or
          $this->file_ext == 'png' or
          $this->file_ext == 'bmp' or
          $this->file_ext == 'gif'
      ) {
          return true;
      }
      return false;
  }

  public function fileIsPdf()
  {
      if ($this->file_ext == 'pdf') {
          return true;
      }
      return false;
  }

  public function cvStatus()
  {
      if ($this->file_name) {
          if ($this->cv_checked) {
              return 'Checked';
          }
          return 'Pending';
      }
      return 'Not set yet';
  }


  public function userPictures()
  {
      return $this->hasMany('App\Models\UserPicture', 'user_id');
  }


  public function hasPictures()
  {
      return $this->hasMany('App\Models\UserPicture', 'user_id');
  }

  public function hasPictures1()
  {
      return $this->userProfilePics()->where('checked', false)->first();
  }

  public function userProfilePics()
  {
      return $this->userPictures()->whereImageType('profilepic')->orderBy('id', 'desc')->get();
  }

  public function uploadedPP()
  {
      $pp =  $this->userPictures()->where([
          'autoload' => true,
          'image_type' => 'profilepic'
      ])->orderBy('id', 'desc')->first();
    //   dd($pp);
      if ($pp) {
          return $pp;
      } else {
          return false;
      }
  }

  public function havePendingcImg()
  {
      $pp =  $this->userPictures()->where([
          'autoload' => true,
          'checked' => false,
          'image_type' => 'profilepic'
      ])->orderBy('id', 'desc')->first();
    //   dd($pp);
      if ($pp) {
         return true;
      } else {
          return false;
      }
  }


  public function editedBy()
  {
      return $this->belongsTo('App\Models\User', 'editedby_id');
  }



  public function deactivateSmsSentToUser()
  {

    // dd($this);



    $projectName = env('PROJECT_NAME');
    // dd($projectName);
    $msg = "Dear {$this->name}, Your mobile verification code is {$this->mobile_verify_code} In {$projectName}. please, verify your mobile"; //150 characters allowed here
    // dd($msg);
    $url = smsUrl($to,$msg);
    // dd($url);
    $client = new Client();

    try {
            $r = $client->request('GET', $url);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
        } catch (\GuzzleHttp\Exception\ClientException $e) {
        }





        $to = bdMobile($this->mobile);

        if(strlen($to) != 13)
        {
            return true;
        }

        $masking = smsMaskingCode();
        $apiKey = smsApiKey();
        $msg = "Dear User, your account in taslimamarriagemedia.com is temporarily deactivated. If you want to use your account again, please contact us at 01972006695."; //149 characters here

        $url = "http://connect.primesoftbd.com/smsapi/non-masking?api_key={$apiKey}&smsType=text&mobileNo={$to}&smsContent={$msg}";
        // $url = "http://connect.primesoftbd.com/smsapi/masking?api_key={$apiKey}&smsType=text&maskingID={$masking}&mobileNo={$to}&smsContent={$msg}";
        $client = new Client();

        try {
                $r = $client->request('GET', $url);
            } catch (\GuzzleHttp\Exception\ConnectException $e) {
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }
  }



  public function deactivateEmailSentToUser(User $user)
  {
      dd($this);
      if((env('APP_ENV') == 'production'))
        {
            Mail::send('emails.automails.deactivateEmailSentToUser', ['user'=>$user], function ($message) use($user) {
                // $message->from(senderMails(), url('/'));
                $message->to($user->email, url('/'))
                ->subject('Your Account Temporarily Deactivated in taslimamarriagemedia.com');
            });
        }
  }


  public function isMale()
  {
      if ($this->gender == 'Male') {
          return true;
      }
      return false;
  }


  public function meActive()
  {
      if ($this->active == true) {
          return true;
      }
      return false;
  }

  public function oltGender()
    {
        if ($this->isMale()) {
            return 'Female';
        }
        return 'Male';
    }


    public function isActive()
    {
        return User::where('active', true)->get();
    }



    public function searchPreferenceUsers($paginate)
    {
        if (! $this->searchTerm)
        {
          $this->pertnerPreference()->create(['addedby_id' => $this->id]);
        }

       $searchTerm = $this->pertnerPreference;


    //   dd($searchTerm, $minAgeDate, $maxAgeDate);
    if($searchTerm->min_age && $searchTerm->max_age)
    {


        $minAgeDate = Carbon::now()->subyear($searchTerm->min_age)->toDateString();
        $maxAgeDate = Carbon::now()->subyear($searchTerm->max_age)->toDateString();
        $users = User::whereDoesntHave('blockerOf',function($query){
            $query->where('user_id', $this->id);
        })
    ->whereDoesntHave('blockss', function($qq){
        $qq->where('user_second_id', $this->id);
    })
    ->where('dob', '<=', $minAgeDate)
    ->where('dob', '>=', $maxAgeDate)
    ->where('gender', '!=', $this->gender)
    ->where('active',1);

    }else{
        $users = User::where('gender', '!=', $this->gender) ->where('active',1);

    }
    //   $users = User::whereDoesntHave('blockerOf',function($query){
    //             $query->where('user_id', $this->id);
    //         })
    //     ->whereDoesntHave('blockss', function($qq){
    //         $qq->where('user_second_id', $this->id);
    //     })
    //   ->where('dob', '<=', $minAgeDate)
    //   ->where('dob', '>=', $maxAgeDate)

    // $users = User::where('gender', '!=', $this->gender)
    //     ->where(function ($query) use ($searchTerm) {



            // if ($searchTerm->profession)
            // {
            //     $query->where('profession', $searchTerm->profession);
            // }

            // if($searchTerm->country)
            // {
            //     $query->where('country', $searchTerm->country);
            // }

            // if($searchTerm->marital_status)
            // {
            //     $query->where('marital_status', $searchTerm->marital_status);
            // }
            // if($searchTerm->religion)
            // {
            //     $query->where('religion', $searchTerm->religion);
            // }


            // if ($searchTerm->min_height && $searchTerm->max_height)
            // {

            //     $minH = UserSettingItem::where('field_id', 6)->where('title', $searchTerm->min_height)->first();

            //     $maxH = UserSettingItem::where('field_id', 6)->where('title', $searchTerm->max_height)->first();

            //     if($minH && $maxH)
            //     {
            //         $heights = UserSettingItem::where('field_id', 6)->whereBetween('id', [$minH->id, $maxH->id])->pluck('title');

            //         $query->whereIn('height',$heights);


            //     }
            // }
       // })


       $users =$users->orderBy('updated_at', 'desc')
      ->paginate($paginate);
      return $users;

    }
    public function SmsSend($to,$msg)
    {
        $url = smsUrl($to, $msg);
        $client = new Client();

        try {
                $r = $client->request('GET', $url);
            } catch (\GuzzleHttp\Exception\ConnectException $e) {
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }
    }

    public function registerSmsSend()
    {
        $to=$this->mobile;
        $msg="Thank You,$this->name.For your registration on vipmarriagemedia.plz visit https://www.vipmarriagemedia.com/";
        if(strlen($to) != 14)
        {
            return true;
        }

        $url = smsUrl($to, $msg);
        $client = new Client();

        try {
                $r = $client->request('GET', $url);
            } catch (\GuzzleHttp\Exception\ConnectException $e) {
            } catch (\GuzzleHttp\Exception\ClientException $e) {
            }
    }
    public function passwordResetSmsSend()
    {
        $to = bdMobile($this->mobile);

        if (strlen($to) != 13) {
            return true;
        }


        $msg = $this->password_temp . ' is temporary password for your account (' . $this->email . ') in https://vipmarriagemedia.com.';

        $url = smsUrl($to, $msg);
        // $url = "http://connect.primesoftbd.com/smsapi/non-masking?api_key={$apiKey}&smsType=text&mobileNo={$to}&smsContent={$msg}";
        // $url = "http://connect.primesoftbd.com/smsapi/masking?api_key={$apiKey}&smsType=text&maskingID={$masking}&mobileNo={$to}&smsContent={$msg}";
        $client = new Client();

        try {
            $r = $client->request('GET', $url);
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
        } catch (\GuzzleHttp\Exception\ClientException $e) {
        }
    }




}
