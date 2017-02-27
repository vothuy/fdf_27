<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = "comments";

    protected $fillable = [
    	'content',
    	'user_id',
    	'product_id',
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
