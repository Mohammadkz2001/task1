<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable, SoftDeletes;


    protected $fillable = [
        'name',
        'author_id',
        'publisher_id',
        'quantity',
        'description',


    ];
//    public function __construct()
//    {
//
//    }


    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(publisher::class);
    }

    public function week()
    {
        return $this->belongsToMany(Week::class);
    }

}
