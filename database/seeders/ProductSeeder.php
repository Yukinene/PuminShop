<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = "Almonds";
        $product->description = "Almonds 500g";
        $product->price = 250.00;
        $product->amount = 100;
        $product->save();

        $product = new Product();
        $product->name = "Cashew nut";
        $product->description = "Cashew nut 500kg";
        $product->price = 150.00;
        $product->amount = 0;
        $product->save();

        $product = new Product();
        $product->name = "Fried Cashews Nuts";
        $product->description = "Fried Cashews Nuts 500g";
        $product->price = 150.00;
        $product->amount = 1;
        $product->save();
    }
}
