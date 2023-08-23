<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Whitecube\NovaFlexibleContent\Concerns\HasFlexible;

class Page extends Model
{
    use HasFactory, HasFlexible;

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
}
