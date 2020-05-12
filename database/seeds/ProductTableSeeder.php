<?php

use Illuminate\Database\Seeder;
use App\Product;
use Illuminate\Support\Arr;
use App\Category;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 30; $i++) {
            Product::create([
                'name' => 'Product' . $i,
                'slug' => 'product-' . $i,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua.',
                'extract' => 'Lorem ipsum dolor sit amet',
                'price' => rand(0,1000),
                'price_old' => 0.00,
                'percent_promo' => rand(0,50),
                'slide_principal' => rand(0,1),
                'state' => Arr::random(['new', 'old']),
                'visible' => rand(0,1),
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'category_id'=> rand(8,11)
            ]);
        }
    }
}
