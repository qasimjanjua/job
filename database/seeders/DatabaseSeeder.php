<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $products = [];
        $products[] = ['product_code' => 'FR1', 'name' => 'Fruit tea', 'price' => 3.11];
        $products[] = ['product_code' => 'SR1', 'name' => 'Strawberries', 'price' => 5.00];
        $products[] = ['product_code' => 'CF1', 'name' => 'Coffee', 'price' => 11.23];

        Product::insert($products);
        
    }
}
