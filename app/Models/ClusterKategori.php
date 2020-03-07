<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use League\Flysystem\Config;
use Spatie\Translatable\HasTranslations;

class ClusterKategori extends Model
{
    use HasTranslations;

    protected $table  = 'cluster_kategoris';

    protected $guarded = ['id'];

    public $translatable = ['name'];

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }

    public function getSubKategori()
    {
        return $this->belongsTo(SubKategori::class,'subkategori_id');
    }
}
