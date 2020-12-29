<?php

namespace Database\Seeders;

use App\Models\CategoriesForAdmin;
use App\Models\HighlightedCategory;
use App\Models\ProductForVendor;
use Illuminate\Database\Seeder;

class DemoProductNServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
            'name'=>"Product 1 from a",
            'category_id'=>1,
            'sub_category_id'=>1,
            'description'=>"fdsfdsf",
            'price_start'=>12,
            'price_max'=>120,
            'shipping_cost'=>50,
            'tax_included'=>true,
            'tax_rate'=>0,
            'created_by_id'=>4,
            ] ,
            [
            'name'=>"Product 2 from b",
            'category_id'=>1,
            'sub_category_id'=>1,
            'description'=>"fdsfdsf",
            'price_start'=>12,
            'price_max'=>120,
            'shipping_cost'=>50,
            'tax_included'=>true,
            'tax_rate'=>0,
            'created_by_id'=>5,
            ]
        ];

        ProductForVendor::insert($data);

    }
}
