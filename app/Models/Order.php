<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable =
    [   'order_number',
         'payment_method',
         'payment_status',
         'order_status',
        'category',
        'due_date',
        'customer_id',
        'totalprice'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }
    public function customer()
    {
    return $this->belongsTo('App\Customer');
    }
    
}
