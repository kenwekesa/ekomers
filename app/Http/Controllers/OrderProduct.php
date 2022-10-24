<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    
    protected $table = 'order_product';

    protected $fillable = [
        'order_id', 'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function orders()
    {
    	return $this->belongsTo(Order::class,'order_id');
    }
}
