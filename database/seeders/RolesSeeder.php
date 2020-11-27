<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = date("Y-m-d H:i:s");
        $list = [
            [
                'name' => 'Administrateur',
                'app_name' => 'Gestion',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'RH',
                'app_name' => 'Gestion',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Commercial',
                'app_name' => 'Gestion',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Employé',
                'app_name' => 'Gestion',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Client',
                'app_name' => 'Drive',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Apprenant',
                'app_name' => 'Mooc',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Fournisseur',
                'app_name' => 'Drive',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        Role::insert($list);
    }
}
