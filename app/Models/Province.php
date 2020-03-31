<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $guarded = ['id'];

    public function getCity()
    {
        return $this->hasMany(Cities::class, 'province_id');
    }
}
