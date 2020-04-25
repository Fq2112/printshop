<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentCart extends Model
{
    protected $table = 'payment_carts';

    protected $guarded = ['id'];

    protected $casts = [
        'cart_ids' => 'array',
    ];
}
