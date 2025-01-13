<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Option;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'surface',
        'price',
        'rooms',
        'bedrooms',
        'floor',
        'city',
        'address',
        'postal_code',
        'sold',
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }
}
