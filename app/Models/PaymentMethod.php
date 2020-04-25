<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_methods';

    protected $guarded = ['id'];

    public function paymentCategories()
    {
        return $this->belongsTo(PaymentCategory::class, 'payment_category_id');
    }

}
