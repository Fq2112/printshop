<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClusterKategori extends Model
{
    protected $table  = 'cluster_kategoris';

    protected $guarded = ['id'];

    public function getSubKategori()
    {
        return $this->belongsTo(SubKategori::class,'subkategori_id');
    }
}
