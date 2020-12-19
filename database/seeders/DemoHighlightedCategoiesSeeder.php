<?php

namespace Database\Seeders;

use App\Models\CategoriesForAdmin;
use App\Models\HighlightedCategory;
use Illuminate\Database\Seeder;

class DemoHighlightedCategoiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cat=CategoriesForAdmin::all()->take(7);
        HighlightedCategory::insert([['id'=>1]]);
        HighlightedCategory::findOrFail(1)->categories()->sync($cat);
    }
}
