<?php

namespace Database\Seeders;

use App\Models\CategoriesForAdmin;
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

        $demo_cat=7;
        $demo_cat_name=['foods','hotels','jobs','medicals','services','shopping','automotive'];
        $demo_cat_icon=['icon-pizza','icon-bed','icon-brush2','icon-pharmaceutical','icon-cog','icon-bag','icon-car'];
        $data=[];
        for ($i=0;$i<$demo_cat;$i++){
            $data[]=[
                'name'=>$demo_cat_name[$i],
                'description'=>$faker->paragraph(),
                'created_by_id'=>1,
                'icon'=>$demo_cat_icon[$i],

            ];
        }
        CategoriesForAdmin::insert($data);
    }
}
