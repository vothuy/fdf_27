<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    
    protected $fillable = [
        'name',
        'category_id',
        'price',
        'amount',
        'image',
        'inventory',
        'avg_rating',
    ];

    public $timestamps = false;

    public function cate()
    {

    	return $this->belongTo(Category::class);
    }

    public function comments()
    {

    	return $this->hasMany(Comment::class);
    }

    public function ratings()
    {

    	return $this->hasMany(Rating::class);
    }

    public function orderdetails()
    {
        
    	return $this->hasMany(OrderDetail::class);
    }
}
