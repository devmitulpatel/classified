<?php

namespace Database\Seeders;

use App\Models\ProductForVendor;
use App\Models\ServiceForVendor;
use Illuminate\Database\Seeder;

class DemoServiceSeeder extends Seeder
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
                'name'=>"Services 1 from a",
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
                    storage_path(implode("/", ['sample','s1.jpg']))
                ],
                'videos'=>[

                    storage_path(implode("/", ['sample','s1.mp4']))

                ]

            ] ,
            [
                'name'=>"Services 2 from b",
                'category_id'=>1,
                'sub_category_id'=>1,
                'description'=>"fdsfdsf",
                'price_start'=>12,
                'price_max'=>120,
                'shipping_cost'=>50,
                'tax_included'=>true,
                'tax_rate'=>0,
                'created_by_id'=>5,  'imagaes'=>[
                storage_path(implode("/", ['sample','s2.jpg']))
            ],
                'videos'=>[

                    storage_path(implode("/", ['sample','s2.mp4']))

                ]

            ]
        ];

        foreach ($data as $v){
            $img=$v['imagaes'];
            $videos=$v['videos'];
            unset($v['imagaes']);
            unset($v['videos']);
            $productForVendor= ServiceForVendor::create($v);

            foreach ($img as $file) {
                $productForVendor->addMedia($file)->toMediaCollection('images');

            }

            foreach ($videos as $file) {

                $productForVendor->addMedia($file)->toMediaCollection('videos');

            }


        }


    }
}
