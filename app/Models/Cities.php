<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    protected $guarded = ['id'];

    public function getProvince()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function getAddress()
    {
        return $this->hasMany(Address::class, 'city_id');
    }

    public function getSuburbs()
    {
        return $this->hasMany(Suburbs::class,'suburbs_id');
    }
}
