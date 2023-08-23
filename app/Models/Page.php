<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;

class Page extends Model implements HasMedia
{
    use HasFactory, HasFlexible, InteractsWithMedia;

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if ($post->user_id === null) {
                $post->user_id = auth()->id();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('nova-thumb')
            ->width(320)
            ->height(320)
            ->extractVideoFrameAtSecond(1);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('nova-thumb')->useDisk('public')->singleFile();
        $this->addMediaCollection('image')->useDisk('public')->singleFile();
    }
}
