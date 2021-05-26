<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnbanAppeal extends Model
{
    use HasFactory;

    /**
     * The table's name.
     *
     * @var string
     */
    protected $table = 'unban_appeal';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'request_id';

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
     * The ban related to this unban appeal.
     */
    public function ban() {
        return $this->hasOne(Ban::class, 'ban_id');
    }

    /**
     * The request related to this unban appeal.
     */
    public function request() {
        return $this->belongsTo(Request_db::class, 'request_id');
    }
}
