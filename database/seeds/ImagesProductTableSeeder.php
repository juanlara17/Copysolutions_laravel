<?php

use Illuminate\Database\Seeder;
use App\Image;

class ImagesProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i = 1; $i <= 10; $i++) {
            Image::create([
                'url' => 'https://s3.amazonaws.com/htw/dt-contest-entries/thumbs/116701/canada-real-estate-franchise-food-corporate-consulting-business-business-card-design.png',
                'imageable_type' => 'App\Product',
                'imageable_id' => 65 + $i
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            Image::create([
                'url' => 'https://img.freepik.com/free-vector/blue-horizontal-business-banner-layout-template-design_44745-1.jpg?size=338&ext=jpg',
                'imageable_type' => 'App\Product',
                'imageable_id' => 75 + $i
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            Image::create([
                'url' => 'https://5.imimg.com/data5/CQ/RT/MY-45115228/creative-brochure-design-psd-500x500.jpg',
                'imageable_type' => 'App\Product',
                'imageable_id' => 85 + $i
            ]);
        }
    }
}
