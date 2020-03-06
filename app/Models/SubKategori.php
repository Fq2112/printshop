<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    protected $table  = 'sub_kategoris';

    protected $guarded = ['id'];

    public function getCluster()
    {
        return $this->hasMany(ClusterKategori::class, 'subkategori_id');
    }

    public function getKategori()
    {
        return $this->belongsTo(Kategori::class,'kategoris_id');
    }
}
