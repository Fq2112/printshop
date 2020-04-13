<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use League\Flysystem\Config;
use Spatie\Translatable\HasTranslations;

class Finishing extends Model
{
    use HasTranslations;

    protected $table = 'finishings';

    protected $guarded = ['id'];

    public $translatable = ['name'];

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
