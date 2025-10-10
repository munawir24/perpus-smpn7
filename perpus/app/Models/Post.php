<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Post extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['category_id', 'title', 'slug', 'content', 'view', 'status', 'pin'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // public function registerMediaConversions(?Media $media = null): void
    // {
    //     $this
    //         ->addMediaConversion('preview')
    //         ->fit(Fit::Contain, 300, 300)
    //         ->nonQueued();
    // }
    // public function addMedia(string|UploadedFile $file): FileAdder
    // {
    //     return $this->addMedia($file)
    //         ->toMediaCollection('img');
    // }
}
