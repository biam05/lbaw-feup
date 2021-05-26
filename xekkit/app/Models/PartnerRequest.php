<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerRequest extends Model
{
    use HasFactory;

    /**
     * The table's name.
     *
     * @var string
     */
    protected $table = 'partner_request';

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
     * Indicates the type of the request.
     *
     * @var string
     */
    public $type = "partner_request";

    /**
     * The request related to this partner request.
     */
    public function request() {
        return $this->belongsTo(Request_db::class, 'request_id');
    }
}
