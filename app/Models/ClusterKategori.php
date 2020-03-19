<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Spatie\Translatable\HasTranslations;

class ClusterKategori extends Model
{
    use HasTranslations;

    protected $table = 'cluster_kategoris';

    protected $guarded = ['id'];

    public $translatable = ['name', 'permalink'];

    public function getSubKategori()
    {
        return $this->belongsTo(SubKategori::class, 'subkategori_id');
    }

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
