<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;

    protected $fillable = [
      'saturday',
      'sunday',
      'monday',
      'thursday',
      'wendsday',
      'tuesday',
      'friday',
      'book_id'
    ];

    public function book()
    {
        return $this->belongsToMany(Book::class);
    }

}
