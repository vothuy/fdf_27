<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table="ratings";

    protected $fillable = [
    	'product_id',
    	'user_id',
    	'rating',
    ];
    
    public $timestamps = false;

    public function user()
    {

    	return $this->belongTo(User::class);
    }

    public function product()
    {
    	
    	return $this->belongTo(Product::class);
    }
}
