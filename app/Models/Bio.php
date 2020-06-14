<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    protected $table = 'bios';

    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
