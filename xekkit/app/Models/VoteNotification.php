<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteNotification extends Model
{
    use HasFactory;

    /**
     * The table's name.
     *
     * @var string
     */
    protected $table = 'vote_notification';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the user that voted on the author's content.
     */
    public function voter()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * Get the user that owns the vote notification.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the content associated with the vote notification.
     */
    public function content()
    {
        return $this->hasOne(Content::class, 'content_id');
    }
}