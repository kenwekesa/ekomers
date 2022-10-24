<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\Customer as Authenticatable;

class Customer extends Model
{
    protected $table ='customers';

    protected $fillable =
      
    [
        'name',
        'city',
        'phone',
        'email',
        'password'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        $this->hasMany('App\Order');
    }
}
