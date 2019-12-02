<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
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
                'name'  =>  'Branding',
                'slug'  =>  'branding',
                'description' => 'Designs',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'name' => 'Digital Printer',
                'slug' => 'digital printer',
                'description' => 'Type of Advertising',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        );

        Category::insert($data);
    }
}
