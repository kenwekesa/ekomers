<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    protected $table = 'payments';

    protected $fillable =
    [   'amount_paid',
         'payment_method',
         'customer_id',
         'balance'
    
    ];
}
