<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrackingLog extends Model
{
    protected $table = 'tracking_logs';

    protected $guarded = ['id'];

    public function getPayment()
    {
        return $this->belongsTo(PaymentCart::class,'payment_id');
    }
}
