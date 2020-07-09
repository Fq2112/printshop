<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PaymentCart extends Model
{
    protected $table = 'payment_carts';

    protected $guarded = ['id'];

    protected $casts = ['cart_ids' => 'array'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getShippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address');
    }

    public function getBillingAddress()
    {
        return $this->belongsTo(Address::class, 'billing_address');
    }
}
