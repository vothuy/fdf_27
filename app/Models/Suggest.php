<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $table = "suggests";

    protected $fillable = [
    	'user_id',
    	'category_id',
    	'name',
    	'images',
    	'status',
    ];
    
    public $timestamps = false;

    public function user()
    {

    	return $this->belongTo(User::class);
    }

    public function category()
    {
    	
    	return $this->belongTo(Category::class);
    }
}
