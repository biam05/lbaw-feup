<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    /**
     * The table's name.
     *
     * @var string
     */
    protected $table = 'content';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the content that owns the news.
     */
    public function new()
    {
        return $this->hasOne(News::class, 'content_id');
    }

    /**
     * Get the content that owns the comment.
     */
    public function comment()
    {
        return $this->hasOne(Comment::class, 'content_id');
    }

    /**
     * Get the author of the content.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the users that voted on this content
     */
    public function voters()
    {
        return $this->belongsToMany(User::class, 'vote', 'content_id', 'users_id')->withPivot('value');
    }

    public static function getVote(News $news){
        $vote = "";
        if(Auth::check()){
            $voter = $news->content->voters()
                ->where('users_id', Auth::id())
                ->first();
            if($voter != null){ //voted on the post
                if($voter->pivot->value >= 1) $vote = "upvote";
                else if($voter->pivot->value <= -1) $vote ="downvote";
            }
        }
        return $vote;
    }
}
