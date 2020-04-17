<?php

namespace App\Models;

use Illuminate\Support\Facades\Config;
use Spatie\Translatable\HasTranslations;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasTranslations;

    protected $table = 'units';

    protected $guarded = ['id'];

    public $translatable = ['name'];

    public function getSubkatSpecs()
    {
        return $this->hasMany(DetailSubkat::class, 'unit_id');
    }

    public function getClusterSpecs()
    {
        return $this->hasMany(DetailProduct::class, 'unit_id');
    }

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
