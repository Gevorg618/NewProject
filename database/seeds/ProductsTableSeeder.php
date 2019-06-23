<?php

use App\Models\Products\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Product::truncate();
        factory(Product::class, 100)->create();
    }
}
