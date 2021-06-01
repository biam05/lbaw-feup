<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The table's name.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 
        'email', 
        'password',
        'birthdate',
        'gender',
        'is_partner',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The contents the users has voted on.
     */
    public function voteOn() {
        return $this->belongsToMany(Content::class, 'vote', 'users_id', 'content_id')->withPivot('value');
    }

    /**
     * The users I follow.
     */
    public function following() {
        return $this->belongsToMany(User::class, 'follow', 'follower_id', 'users_id');
    }

    /**
     * The users that follow me.
     */
    public function followedBy() {
        return $this->belongsToMany(User::class, 'follow', 'users_id', 'follower_id');
    }

    /**
     * The bans I have.
     */
    public function bans() {
        return $this->hasMany(Ban::class, 'users_id');
    }

    /**
     * The bans I have moderated.
     */
    public function moderatedBans() {
        return $this->hasMany(Ban::class, 'moderator_id');
    }

    /**
     * The requests I have made.
     */
    public function requests() {
        return $this->hasMany(Request_db::class, 'users_id');
    }

    /**
     * The requests I have made.
     */
    public static function pendingPartnerRequests() {

        $user=User::findOrFail(Auth::id());
        /*$requests=$user->hasMany(Request_db::class, 'from_id'); */
        DB::enableQueryLog();
        $requests = DB::table('request')->select('id', 'status')->where('from_id',$user->id)->get();
       
      
        foreach ($requests as $r)
        {
            $request=Request_db::findOrFail($r->id);
            
            if(!empty($request->partnerRequest()))
            {
                if($request->status==null)
                {
    
                    return true;
                }
            }
        }
        
        return false;
         
    }

    /**
     * The content I have made.
     */
    public function contents() {
        return $this->hasMany(Content::class, 'author_id');
    }

    /**
     * The news I have posted.
     */
    public function news() {
        return News::whereIn('content_id', function($query) {
            $query->select('id')
                ->from('content')
                ->where('author_id', $this->id);
        })->get();
    }

    /**
     * The comment notifications I have.
     */
    public function commentNotifications() {
        return $this->hasMany(CommentNotification::class, 'users_id');
    }

    /**
     * The follow notifications I have.
     */
    public function followNotifications() {
        return $this->hasMany(FollowNotification::class, 'users_id');
    }

    /**
     * The vote notifications I have.
     */
    public function voteNotifications() {
        return $this->hasMany(VoteNotification::class, 'author_id');
    }
    
    public static function followOrUnfollow(User $user){
        $following = DB::table('follow')
            ->where('users_id', $user->id)
            ->where('follower_id', Auth::user()->id)
            ->first();

        if($following != "") $follow = false;
        else $follow = true;

        return $follow;
    }

    /**
     * Find user by username.
     *
     * @param string $username
     */
    public static function getUser($username) {
        return User::where('username','=',$username)->first();
    }

    public function checkBan() {
        $bans = $this->bans()->where(function ($query) {
            $now = DB::raw('NOW()');
            $query->whereNull('end_date')
                  ->orWhere('end_date','>',$now);
        })->get();
        
        if($bans == null)
        {
            $user->is_banned=false;
            $user->save();
        }
    }
}
