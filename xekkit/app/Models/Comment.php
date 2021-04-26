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
    protected $table = 'commment';

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
    public function new()
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
     * Get the comment (reply) associated with the comment.
     */
    public function reply()
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
