<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = "orders";

    protected $fillable = [
    	'user_id',
    	'product_id',
    	'payment',
    	'amount',
    ];
    
    public $timestamps = false;

    public function user()
    {

    	return $this->belongTo(User::class);
    }

    public function orderdetails()
    {

    	return $this->hasMany(OrderDetail::class);
    }
}
