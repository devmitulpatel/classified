<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class DemoCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        $demo_cat=5;
        $data=[];
        for ($i=0;$i<$demo_cat;$i++){
            $data[]=[
                'name'=>$faker->word(),
                'description'=>$faker->paragraph(),
                'created_by_id'=>1,

            ];
        }
        CategoriesForAdmin::insert($data);
    }
}
