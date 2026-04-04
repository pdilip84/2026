<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /*
    SELECT reviews.id,reviews.book_id,books.title,reviews.rating
    FROM books
    LEFT JOIN reviews
    ON books.id = reviews.book_id
    WHERE reviews.rating = 5
    GROUP by reviews.book_id;
    */

    public function scopeFiveStarRating($query)
    {
        return $query->whereHas('reviews', function ($subQuery) {
            $subQuery->where('rating', 5);
        })->distinct();
    }
}
