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

    public function scopeAuthorDr($query)
    {
        return $query->where('author', 'like', '%Dr.%');
    }

    /*
    SELECT reviews.book_id, count(reviews.rating) as total
    FROM reviews
    GROUP BY reviews.book_id
    ORDER BY total DESC;
    */
    public function scopeMostReviewedBooks($query)
    {
        return $query->withCount('reviews')->orderBy('reviews_count', 'desc');
    }

    /*
    SELECT reviews.book_id, AVG(reviews.rating) as avg_rating, count(reviews.rating) as total_reviews
    FROM reviews
    GROUP BY reviews.book_id
    ORDER BY avg_rating DESC;
    */
    public function scopeHighestRatedBooks($query)
    {
        return $query->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating', 'desc');
    }
}