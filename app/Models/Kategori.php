<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Kategori extends Model
{
    use HasTranslations;

    protected $table = 'kategoris';

    protected $guarded = ['id'];

    public $translatable = ['name','caption'];

    public function getSubKategori()
    {
        return $this->hasMany(SubKategori::class, 'kategoris_id');
    }
}
