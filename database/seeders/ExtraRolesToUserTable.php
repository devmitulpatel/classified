<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class ExtraRolesToUserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [

            [
                'id'    => 3,
                'title' => 'Moderator',
            ],
            [
                'id'    => 4,
                'title' => 'Vendor',
            ],

        ];

        Role::insert($roles);
    }
}
