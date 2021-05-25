<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request_db extends Model
{
    use HasFactory;

    /**
     * The table's name.
     *
     * @var string
     */
    protected $table = 'request';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The report related to this request.
     */
    public function reportContent() {
        return $this->hasOne(ReportContent::class, 'request_id');
    }

    /**
     * The report related to this request.
     */
    public function reportUser() {
        return $this->hasOne(ReportUser::class, 'request_id');
    }

    /**
     * The partner request related to this request.
     */
    public function partnerRequest() {
        return $this->hasOne(PartnerRequest::class, 'request_id');
    }

    /**
     * The unban appeal related to this request.
     */
    public function unbanAppeal() {
        return $this->hasOne(UnbanAppeal::class, 'request_id');
    }

    /**
     * The moderator related to this request.
     */
    public function moderator() {
        return $this->belongsTo(User::class, 'moderator_id');
    }

    /**
     * The user that made the request.
     */
    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }


    
}
