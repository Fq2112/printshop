<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table  = 'kategoris';

    protected $guarded = ['id'];

    public function getSubKategori()
    {
        return $this->hasMany(SubKategori::class, 'kategoris_id');
    }
}
