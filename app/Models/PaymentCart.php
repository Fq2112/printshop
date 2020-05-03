<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PaymentCart extends Model
{
    protected $table = 'payment_carts';

    protected $guarded = ['id'];

    protected $casts = [
        'cart_ids' => 'array',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getAddress()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function getCart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
