<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
   protected $table='products';
   protected $fillable =
    [
        'productname','unitprice','category','brand','description','photo','expirydate'
    ];

  public function cart()
  {
      return $this->belongsTo('App\Cart','product_id')->withPivot();
  }
  public function orders()
  {
      return $this->belongsToMany('App\Order')->withPivot();
  }

  public function scopeFilter($query, array $filters)
  {     
    
    if($filters['category'] ?? false)
    {

        $query->where('category','like','%'. request('category'). '%');
    }

  }
}
