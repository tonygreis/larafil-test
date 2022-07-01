<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug', 'is_published'];

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function meta()
    {
        return $this->morphOne(Meta::class, 'metaable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
