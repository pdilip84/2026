<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method bool delete()
 */
class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
    protected $fillable = [
        'name',
        'price',
        'stock',
        'description',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    //instock
    //outstock
    //highpriced
    //cheap
    //emptysoon
    //pricerange
    //productbycatname
}
