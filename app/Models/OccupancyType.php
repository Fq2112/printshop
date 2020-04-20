<?php

namespace App\Models;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class OccupancyType extends Model
{
    use HasTranslations;

    protected $table = 'occupancy_types';

    protected $guarded = ['id'];

    public $translatable = ['name'];

    public function getAddress()
    {
        return $this->hasMany(Address::class, 'occupancy_id');
    }

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
