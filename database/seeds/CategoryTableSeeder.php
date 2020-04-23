<?php

use Illuminate\Database\Seeder;
use App\Category;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();
//        dd($now);
        Category::insert([
            ['name'=>'Stationery','slug'=>'stationery','description'=>'lorem ipsum','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Large Format','slug'=>'large-format','description'=>'lorem ipsum','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Short Run','slug'=>'short-run','description'=>'lorem ipsum','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'Delivery','slug'=>'delivery','description'=>'lorem ipsum','created_at'=>$now,'updated_at'=>$now],
        ]);
    }
}
