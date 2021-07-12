<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                "name"=> "Product 1",
                "available_stock"=> 99
            ],
            [
                "name"=> "Product 2",
                "available_stock"=> 0
            ]
        ];

        foreach($arr as $val) {
            DB::table('products')->insert([$val]);
        }
        
    }
}
