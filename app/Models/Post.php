<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'slug', 'description', 'image_path', 'scheduled_at', 'post_image', 'user_id'];

    // Add this property to cast scheduled_at to a datetime type
    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function getScheduledAtFormattedAttribute()
    {
        // Check if scheduled_at is not an instance of Carbon
        if (!$this->scheduled_at instanceof \Carbon\Carbon) {
            // Parse it to a Carbon instance
            $this->attributes['scheduled_at'] = \Carbon\Carbon::parse($this->attributes['scheduled_at']);
        }

        return $this->scheduled_at ? $this->scheduled_at->format('F j, Y H:i') : null;
    }
}
