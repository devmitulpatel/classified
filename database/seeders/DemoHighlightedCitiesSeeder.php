<?php

namespace Database\Seeders;

use App\Models\HighlightedCitiesForAdmin;
use Illuminate\Database\Seeder;

class DemoHighlightedCitiesSeeder extends Seeder
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
                'name'=>'Delhi',
                'digital_location'=>collect(['lat'=>28.644800,'lon'=>77.216721]),
            ],
            [
                'name'=>'Mumbai',
                'digital_location'=>collect(['lat'=>19.076090,'lon'=>72.877426]),
            ],
            [
                'name'=>'Bangalore',
                'digital_location'=>collect(['lat'=>12.972442,'lon'=>77.580643]),
            ]
        ];
        HighlightedCitiesForAdmin::insert($data);

    }
}
