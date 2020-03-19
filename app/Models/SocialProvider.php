<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    protected $table = 'social_providers';

    protected $guarded = ['id'];

    public function getUser()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
