<?php

namespace App\Models;

use App\Enums\EmbedType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Course extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable;

    protected $fillable = ['name', 'slug', 'description', 'github_repo', 'is_published'];

    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    #[SearchUsingPrefix(['id', 'name'])]
    #[SearchUsingFullText(['description'])]
    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    public function meta()
    {
        return $this->morphOne(Meta::class, 'metaable');
    }
}
