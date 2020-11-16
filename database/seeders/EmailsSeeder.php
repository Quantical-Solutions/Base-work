<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Email;

class EmailsSeeder extends Seeder
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
                'email' => 'infos@quanticalsolutions.com',
                'department' => 'Sales Marketing',
                'entity_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'email' => 'games@quanticalsolutions.com',
                'department' => 'Communication / Design',
                'entity_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'email' => 'tech-support@quanticalsolutions.com',
                'department' => 'IT',
                'entity_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        Email::insert($list);
    }
}
