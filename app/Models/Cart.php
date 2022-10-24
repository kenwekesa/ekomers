<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $table = 'carts';

    protected $fillable = ['customer_id', 'product_id','quantity', 'totalprice','payment_status','payment_method'];

    protected $primaryKey = 'idd';


    public function product()
    {
        return $this->hasMany('App\Product','id','product_id');
    }
    
   public function user()
   {
       return $this->belongsTo('App\User','user_id','customer_id');
   }
    //
}
