<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        return $this->hasMany(Request::class, 'users_id');
    }

    /**
     * The content I have made.
     */
    public function contents() {
        return $this->hasMany(Content::class, 'author_id');
    }


}
