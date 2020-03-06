<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ClusterKategori extends Model
{
    use HasTranslations;

    protected $table  = 'cluster_kategoris';

    protected $guarded = ['id'];

    public $translatable = ['name'];

    public function getSubKategori()
    {
        return $this->belongsTo(SubKategori::class,'subkategori_id');
    }
}
