<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Drive_relation;

class DriveRelationsSeeder extends Seeder
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
                'path_id' => 4,
                'user_id' => 6,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 3,
                'user_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 9,
                'user_id' => 9,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 6,
                'user_id' => 5,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 1,
                'user_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 2,
                'user_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 7,
                'user_id' => 5,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 4,
                'user_id' => 9,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 8,
                'user_id' => 8,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 7,
                'user_id' => 7,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 1,
                'user_id' => 4,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 3,
                'user_id' => 4,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 2,
                'user_id' => 4,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 2,
                'user_id' => 10,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 2,
                'user_id' => 11,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 3,
                'user_id' => 2,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 1,
                'user_id' => 2,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 2,
                'user_id' => 2,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 3,
                'user_id' => 3,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 1,
                'user_id' => 3,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path_id' => 2,
                'user_id' => 3,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        Drive_relation::insert($list);
    }
}
