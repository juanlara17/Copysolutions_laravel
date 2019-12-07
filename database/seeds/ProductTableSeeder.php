<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Product 1',
                'slug' => 'product-1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua.',
                'extract' => 'Lorem ipsum dolor sit amet',
                'price' => 275.00,
                'price_old' => 0.00,
                'percent_promo' => 10.0,
                'slide_principal' => 0,
                'state' => 'nuevo',
                'image' => 'https://c49d16a6c82563251344-1ab5a5b00ecdd96a368a8d8d17482920.ssl.cf2.rackcdn.com/images/TS_Mens_Black_Joker_Lines_T_Shirt_14_99_MOdel-617-662.jpg',
                'visible' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'category_id' => 1
            ],
            [
                'name' => 'Product 2',
                'slug' => 'product-2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua.',
                'extract' => 'Lorem ipsum dolor sit amet',
                'price' => 50.00,
                'price_old' => 0.00,
                'percent_promo' => 50.0,
                'slide_principal' => 0,
                'state' => 'nuevo',
                'image' => 'https://c49d16a6c82563251344-1ab5a5b00ecdd96a368a8d8d17482920.ssl.cf2.rackcdn.com/images/TS_Mens_Black_Joker_Lines_T_Shirt_14_99_MOdel-617-662.jpg',
                'visible' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'category_id' => 1
            ],
            [
                'name' => 'Product 3',
                'slug' => 'product-3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua.',
                'extract' => 'Lorem ipsum dolor sit amet',
                'price' => 300.00,
                'price_old' => 0.00,
                'percent_promo' => 10.0,
                'slide_principal' => 0,
                'state' => 'nuevo',
                'image' => 'https://c49d16a6c82563251344-1ab5a5b00ecdd96a368a8d8d17482920.ssl.cf2.rackcdn.com/images/TS_Mens_Black_Joker_Lines_T_Shirt_14_99_MOdel-617-662.jpg',
                'visible' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'category_id' => 2
            ]
        );
        Product::insert($data);
    }
}
