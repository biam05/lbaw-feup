<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The table's name.
     *
     * @var string
     */
    protected $table = 'news';

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
     * Get the content that owns the news.
     */
    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }

    /**
     * Get the comments associaceted with the news.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'news_id');
    }

    /**
     * Get the tags associaceted with the news.
     */
    public function tags()
    {
        return $this->hasMany(Tag::class, 'news_tag', 'news_id', 'tag_id');
    }
}
