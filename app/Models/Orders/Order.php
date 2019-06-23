<?php

namespace App\Models\Orders;

use App\Models\Products\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';


    protected $fillable = [
        'invoice_number', 'customers','total_amount' , 'status'
    ];

    const StatusNew = 'new';
    const StatusProcessed = 'processed';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
