<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceTier extends Model
{
    protected $table = 'tiers';

    protected $guarded = ['id'];


    public function  get_type()
    {
        return $this->belongsTo(TypeTier::class,'type_id');
    }
}
