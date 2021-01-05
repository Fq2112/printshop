<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTier extends Model
{
    protected $table  = 'type_tiers';

    protected $guarded = ['id'];

    public function get_tier()
    {
        return $this->hasMany(PriceTier::class,'type_id');
    }

    public function get_detail_subkat()
    {
        return $this->hasOne(DetailSubkat::class,'type_id');
    }

    public function get_detail_product()
    {
        return $this->hasOne(DetailProduct::class,'type_id');
    }
}
