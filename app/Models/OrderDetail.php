<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "order_details";

    protected $fillable = [
    	'order_id',
    	'product_id',
    	'quantity',
    	'price',
    ];
    
    public $timestamps = false;

    public function product()
    {

    	return $this->belongTo(Product::class);
    }

    public function order()
    {
    	
    	return $this->belongTo(Order::class);
    }
}
