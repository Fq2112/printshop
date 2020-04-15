<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Spatie\Translatable\HasTranslations;

class SubKategori extends Model
{
    use HasTranslations;

    protected $table = 'sub_kategoris';

    protected $guarded = ['id'];

    public $translatable = ['name', 'permalink', 'caption'];

    public function getCluster()
    {
        return $this->hasMany(ClusterKategori::class, 'subkategori_id');
    }

    public function getKategori()
    {
        return $this->belongsTo(Kategori::class, 'kategoris_id');
    }

    public function getSpecs()
    {
        return $this->hasOne(DetailSubkat::class, 'subkategori_id');
    }

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
