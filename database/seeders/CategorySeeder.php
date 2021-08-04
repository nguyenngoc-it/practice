<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $category= new Category();
        $category->name='lap Trinh';
        $category->save();
        $category= new Category();
        $category->name='Tai Chinh';
        $category->save();
        $category= new Category();
        $category->name='Kinh Doanh';
        $category->save();
    }
}
