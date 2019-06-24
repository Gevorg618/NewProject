<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_product')->insert([
            'id' => '1',
            'order_id' => '5',
            'product_id' => '25'
        ]);
    }
}
