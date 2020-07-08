<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suburbs extends Model
{
    protected $table = 'suburbs';

    protected $guarded = ['id'];

    public function getAreas()
    {
        return $this->hasMany(Areas::class,'suburbs_id');
    }

    public function getCities()
    {
        return $this->belongsTo(Cities::class,'cities_id');
    }
}
