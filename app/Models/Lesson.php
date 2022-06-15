<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Lesson extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['name', 'slug', 'description', 'external_id', 'is_published', 'platform', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function meta()
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
