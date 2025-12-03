<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'collectible_id',
        'path',
        'is_primary',
        'sort_order',
        'caption',
        'file_size',
        'width',
        'height',
    ];

    protected $casts = [
        'is_primary' => 'boolean',
    ];

    public function collectible(): BelongsTo
    {
        return $this->belongsTo(Collectible::class);
    }
}
