<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    protected $table = 'areas';

    protected $fillable = ['id','name','postal_code'];

    public $incrementing = false;

    public function getSuburbs()
    {
        return $this->belongsTo(Suburbs::class,'suburbs_id');
    }
}
