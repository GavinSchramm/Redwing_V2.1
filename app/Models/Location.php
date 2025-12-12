<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'town_name',
        'state',
        'latitude',
        'longitude',
        'description',
    ];

    public function collectibles(): HasMany
    {
        return $this->hasMany(Collectible::class);
    }
}
