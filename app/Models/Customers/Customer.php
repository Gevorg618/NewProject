<?php

namespace App\Models\Customers;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';


    protected $fillable = [
        'name', 'email'
    ];
}
