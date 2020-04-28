<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $guarded = ['id'];

    public function getCart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
