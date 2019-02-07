<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     protected $fillable = [
        'name', 'email',  'user_id', 'order_id', 'phone', 'price', 'currency', 'plan', 'address_line_1', 'address_line_2', 'city', 'state', 'postal_code', 'country', 'status'
    ];

}
