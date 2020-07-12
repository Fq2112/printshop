<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $guarded = ['id'];

    public function getUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getSubKategori()
    {
        return $this->belongsTo(SubKategori::class, 'subkategori_id');
    }

    public function getCluster()
    {
        return $this->belongsTo(ClusterKategori::class, 'cluster_id');
    }
}
