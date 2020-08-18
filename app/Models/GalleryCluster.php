<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCluster extends Model
{
    protected $table = 'gallery_clusters';
    protected $guarded = ['id'];

    public function getClusterSpecs()
    {
        return $this->belongsTo(ClusterKategori::class, 'cluster_id');
    }
}
