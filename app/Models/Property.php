<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Option;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Picture;

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

    public function getSlug()
    {
        return Str::slug($this->title);
    }

    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }

    /**
     * @param array<UploadedFile[] $files
     */
    public function attachFiles(array $files)
    {
        $pictures = [];
        foreach ($files as $file) {
            if($file->getError()) {
                continue;
            }
            $filename = $file->store('properties/' . $this->id, 'public');
            $pictures[] = ['filename' => $filename];
        }
        if(count($pictures) > 0) {
            $this->pictures()->createMany($pictures);
        }
    }

    public function getFirstPictureUrl(): ?Picture
    {
        return $this->pictures[0] ?? null;
    }
}

