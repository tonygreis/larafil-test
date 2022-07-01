<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'url', 'description'];
    public $timestamps = false;

    public function metaable()
    {
        return $this->morphTo();
    }
}
