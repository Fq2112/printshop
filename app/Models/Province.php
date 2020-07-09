<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $fillable = ['id', 'name'];

    public $incrementing = false;

    public function getCity()
    {
        return $this->hasMany(Cities::class, 'province_id');
    }
}
