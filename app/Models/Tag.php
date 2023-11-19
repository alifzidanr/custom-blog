<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    protected $fillable = ['name']; // Allow mass assignment for the 'name' attribute

    // Define the relationship with posts
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
