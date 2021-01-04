<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailProduct extends Model
{
    protected $table = 'detail_products';

    protected $guarded = ['id'];

    protected $casts = [
        'material_ids' => 'array',
        'type_ids' => 'array',
        'balance_ids' => 'array',
        'page_ids' => 'array',
        'copies_ids' => 'array',
        'size_ids' => 'array',
        'lamination_ids' => 'array',
        'side_ids' => 'array',
        'edge_ids' => 'array',
        'color_ids' => 'array',
        'front_side_ids' => 'array',
        'back_side_ids' => 'array',
        'right_side_ids' => 'array',
        'left_side_ids' => 'array',
        'front_cover_ids' => 'array',
        'back_cover_ids' => 'array',
        'binding_ids' => 'array',
        'print_method_ids' => 'array',
        'finishing_ids' => 'array',
        'folding_ids' => 'array',
        'material_cover_ids' => 'array',
        'side_cover_ids' => 'array',
        'cover_lamination_ids' => 'array',
        'lid_ids' => 'array',
        'orientation_ids' => 'array',
        'extra_ids' => 'array',
        'material_color_ids' => 'array',
        'holder_ids' => 'array',
        'tier_ids' => 'array',
    ];

    public function getCluster()
    {
        return $this->belongsTo(ClusterKategori::class, 'cluster_kategoris_id');
    }

    public function getUnit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
