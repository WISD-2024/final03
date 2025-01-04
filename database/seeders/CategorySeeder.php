<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Meal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();   //重置資料表內容及編號
        Meal::truncate();
        Category::factory(3)->has(Meal::factory(6))->create();
        //category新增15筆資料，meal就新增5筆(meal有category_id，所以要先建立category資料)
    }
}
