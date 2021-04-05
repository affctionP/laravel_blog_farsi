<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now=Carbon::now()->toDateTimeLocalString();
        Category::insert([
            ['name'=>'ورزشی','slug'=>'varzeshi','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'سیاسی','slug'=>'siyasi','created_at'=>$now,'updated_at'=>$now],
            ['name'=>'سینما','slug'=>'cinma','created_at'=>$now,'updated_at'=>$now],

        ]);
    }
}
