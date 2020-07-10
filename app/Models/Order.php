<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $guarded = ['id'];

    public function getPayment()
    {
        return $this->belongsTo(PaymentCart::class, 'payment_carts_id');
    }
}
