<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The table's name.
     *
     * @var string
     */
    protected $table = 'comment';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'content_id';

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the content associated with the comment.
     */
    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }

    /**
     * Get the news associated with the comment.
     */
    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }

    /**
     * Get the comment notification that owns the comment.
     */
    public function commentNotification()
    {
        return $this->hasOne(CommentNotification::class, 'comment_id');
    }

    /**
     * Get the parent comment associated with the comment.
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'content_id', 'reply_to_id');
    }

    /**
     * Get the response comments associated with the comment.
     */
    public function replies(){
        return $this->hasMany(Comment::class, 'reply_to_id')->orderByDesc('content_id');
    }
}
