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
                'imagaes'=>[
                    storage_path(implode("/", ['sample','p1.jpg']))
                ],
                'videos'=>[

                    storage_path(implode("/", ['sample','p1.mp4']))

                ]
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
                'imagaes'=>[
                    storage_path(implode("/", ['sample','p2.jpg']))
                ],
                'videos'=>[

                    storage_path(implode("/", ['sample','p2.mp4']))

                ]
            ]
        ];

        foreach ($data as $v){
            $img=$v['imagaes'];
            $videos=$v['videos'];
            unset($v['imagaes']);
            unset($v['videos']);
            $productForVendor= ProductForVendor::create($v);

            foreach ($img as $file) {
                $productForVendor->addMedia($file)->toMediaCollection('imagaes');

            }

            foreach ($videos as $file) {

                $productForVendor->addMedia($file)->toMediaCollection('videos');

            }


        }



    }
}
