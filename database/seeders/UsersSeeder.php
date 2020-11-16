<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UsersSeeder extends Seeder
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
                'name' => 'Frédéric GEFFRAY',
                'firstname' => 'Frédéric',
                'lastname' => 'GEFFRAY',
                'email' => 'in-touch-fg@quanticalsolutions.com',
                'avatar' => 'in-touch-fg@quanticalsolutions.com.jpg',
                'password' => '$2y$10$VZ0WTZgBJVzNv4Q3Ucobfu7UfXHTMhPLxupZy.Z4khYBFkn2nLQMi',
                'entity_id' => 1,
                'role_id' => 1,
                'phone' => '0662686011',
                'function' => 'CEO',
                'department' => 'IT',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Marion LAPLAGNE',
                'firstname' => 'Marion',
                'lastname' => 'LAPLAGNE',
                'email' => 'in-touch-ml@quanticalsolutions.com',
                'avatar' => 'in-touch-ml@quanticalsolutions.com.jpg',
                'password' => '$2y$10$HLvglKf/rFbM4YG6TAMb3OB9F2c3b.69/23pMpvnVpa.mtKjD0QRq',
                'entity_id' => 1,
                'role_id' => 1,
                'phone' => '0673547996',
                'function' => 'CEO',
                'department' => 'Communication / Design',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Lucie PINTER',
                'firstname' => 'Lucie',
                'lastname' => 'PINTER',
                'email' => 'in-touch-lp@quanticalsolutions.com',
                'avatar' => 'in-touch-lp@quanticalsolutions.com.jpg',
                'password' => '$2y$10$hRwUlet0.Ot3ZNwybev8Fe.SPseXQQPzjKFyLiQJlsvQ8THf5EAqm',
                'entity_id' => 1,
                'role_id' => 2,
                'phone' => '0613724870',
                'function' => 'CEO',
                'department' => 'RH',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'David PINTER',
                'firstname' => 'David',
                'lastname' => 'PINTER',
                'email' => 'in-touch-dp@quanticalsolutions.com',
                'avatar' => 'in-touch-dp@quanticalsolutions.com.jpg',
                'password' => '$2y$12$1B4opBG9R9T5blSQpiUax.z.7iXqpxxbm.tMk3bCSCqgfv.JDhfGy',
                'entity_id' => 1,
                'role_id' => 3,
                'phone' => '0612585260',
                'function' => 'CEO',
                'department' => 'Sales / Marketing',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Pierrick LEMOU',
                'firstname' => 'Pierrick',
                'lastname' => 'LEMOU',
                'email' => 'pierrot33@sucette.fr',
                'avatar' => 'pierrot33@sucette.fr.jpg',
                'password' => Hash::make('test2020'),
                'entity_id' => 1,
                'role_id' => 6,
                'function' => NULL,
                'department' => NULL,
                'phone' => '0678965436',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Linda LEMON',
                'firstname' => 'Linda',
                'lastname' => 'LEMON',
                'email' => 'linda.beauxmelons@pasdeparents.sm',
                'avatar' => 'linda.beauxmelons@pasdeparents.sm.jpg',
                'password' => Hash::make('test2020'),
                'entity_id' => 1,
                'role_id' => 6,
                'function' => NULL,
                'department' => NULL,
                'phone' => '0637598671',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Francky VINCENT',
                'firstname' => 'Francky',
                'lastname' => 'VINCENT',
                'email' => 'touch-fg@quanticalsolutions.com',
                'avatar' => 'touch-fg@quanticalsolutions.com.jpg',
                'password' => Hash::make('test2020'),
                'entity_id' => 1,
                'role_id' => 6,
                'function' => NULL,
                'department' => NULL,
                'phone' => '0651907865',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Jeannette DUPONT',
                'firstname' => 'Jeannette',
                'lastname' => 'DUPONT',
                'email' => 'in-fg@quanticalsolutions.com',
                'avatar' => 'in-fg@quanticalsolutions.com.jpg',
                'password' => Hash::make('test2020'),
                'entity_id' => 1,
                'role_id' => 6,
                'function' => NULL,
                'department' => NULL,
                'phone' => '0987654321',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Coleen GEFFRAY',
                'firstname' => 'Coleen',
                'lastname' => 'GEFFRAY',
                'email' => 'infos@quanticalsolutions.com',
                'avatar' => 'infos@quanticalsolutions.com.jpg',
                'password' => Hash::make('test2020'),
                'entity_id' => 1,
                'role_id' => 6,
                'function' => NULL,
                'department' => NULL,
                'phone' => '0964512547',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Ilias KELESOGLU',
                'firstname' => 'Ilias',
                'lastname' => 'KELESOGLU',
                'email' => 'in-touch-ik@quanticalsolutions.com',
                'avatar' => 'in-touch-ik@quanticalsolutions.com.jpg',
                'password' => '$2y$12$4pAFE5w.E7gsd8k2xs5T/uljhVKBbjsz1ZQNfHVlKupV5kYHEMzMa',
                'entity_id' => 1,
                'role_id' => 4,
                'phone' => '0750440860',
                'function' => 'Développeur / Programmeur',
                'department' => 'IT',
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Séléna BERQUE',
                'firstname' => 'Séléna',
                'lastname' => 'BERQUE',
                'email' => 'in-touch-sb@quanticalsolutions.com',
                'avatar' => 'in-touch-sb@quanticalsolutions.com.jpg',
                'password' => '$2y$12$nyuFx1XUyckRhiO.aerzIOHBLt4TkjUC0LAsiNDWhE0um/n1y5g6W',
                'entity_id' => 1,
                'role_id' => 4,
                'phone' => '0629506289',
                'function' => 'Illustratrice / Web Designer',
                'department' => 'Design',
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        User::insert($list);
    }
}
