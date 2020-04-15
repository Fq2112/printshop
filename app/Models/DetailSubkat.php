<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailSubkat extends Model
{
    protected $table = 'detail_subkats';

    protected $guarded = ['id'];

    protected $casts = [
        'material_ids' => 'array',
        'size_ids' => 'array',
        'lamination_ids' => 'array',
        'side_ids' => 'array',
        'edge_ids' => 'array',
        'color_ids' => 'array',
        'folding_ids' => 'array',
        'front_side_ids' => 'array',
        'back_side_ids' => 'array',
        'right_side_ids' => 'array',
        'left_side_ids' => 'array',
    ];

    public function getSubKategori()
    {
        return $this->belongsTo(SubKategori::class, 'subkategori_id');
    }
}
