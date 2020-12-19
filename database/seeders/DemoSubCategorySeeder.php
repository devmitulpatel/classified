<?php

namespace Database\Seeders;

use App\Models\SubCategoryForAdmin;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DemoSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $allCategory=\App\Models\CategoriesForAdmin::all();

        $demo_sub_cat=5;
        $data=[];

        foreach ($allCategory as $cat){

            for ($i=0;$i<$demo_sub_cat;$i++){
                $data[$cat->id][$i]=[
                    'name'=>$faker->word(),
                    'description'=>$faker->paragraph(),
                    'created_by_id'=>1,
                    'parent_category_id'=>$cat->id

                ];

                $id=SubCategoryForAdmin::insertGetId($data[$cat->id][$i]);
              //  SubCategoryForAdmin::findorfail($id)->parent_category()->sync($cat->id);

            }

        }



    }
}
