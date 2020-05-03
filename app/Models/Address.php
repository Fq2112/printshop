<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Spatie\Translatable\HasTranslations;

class Address extends Model
{
    use HasTranslations;

    protected $table = 'addresses';

    protected $guarded = ['id'];

    protected $translatable = ['save_as'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCity()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public function getOccupancy()
    {
        return $this->belongsTo(OccupancyType::class, 'occupancy_id');
    }

    public function getCart()
    {
        return $this->hasMany(Cart::class, 'address_id');
    }

    public function getPayment()
    {
        return $this->hasMany(PaymentCart::class, 'address_id');
    }

    public function getLocale(): string
    {
        if (is_null(App::getLocale())) {
            Config::set('app.locale', 'id');
        }

        return Config::get('app.locale');
    }
}
