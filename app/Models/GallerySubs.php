<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GallerySubs extends Model
{
    protected $table = 'gallery_subs';
    protected $guarded = ['id'];

    public function getSubKategori()
    {
        return $this->belongsTo(SubKategori::class, 'subkategori_id');
    }
}
