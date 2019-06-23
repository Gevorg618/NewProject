<?php

namespace App\Models\Products;

use App\Models\Orders\Order;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';


    protected $fillable = [
        'name', 'price' , 'in_stock'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
