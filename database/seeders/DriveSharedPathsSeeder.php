<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Drive_shared_path;

class DriveSharedPathsSeeder extends Seeder
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
                'path' => '/drive/Drive d\'équipe/renommage',
                'salt' => '$2y$10$V2PAj2KzyClGLugN1TKDuOiJuHz.laN9wqfVpElOYizIksSPoSsuS',
                'private' => 0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path' => '/drive/Drives partagés/yeeeeah',
                'salt' => '$2y$10$YUvxKAOb6MV8blFkWyxg3.VcfINRb7CeqYWg1XNL8ZkxRyip7QEXq',
                'private' => 0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path' => '/drive/Drive d\'équipe/maxTester',
                'salt' => '$2y$10$8cMeXy2HkxaVdHs3n2RxBOUFyXbiyvHSLfe4qzxrdBogZ4MPzoEWu',
                'private' => 0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path' => '/drive/Drives partagés',
                'salt' => '$2y$12$hui0YjAHdUIXSpJdtFuBuu886Uott1fRNPOLYRLP9Pep7XaNWKf1W',
                'private' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path' => '/drive/Drive d\'équipe',
                'salt' => '$2y$12$RnN5mDn5fy/PlMukYJ6VeOgxSPdmIz.fQJgbl3GajC0pstDeEcYje',
                'private' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path' => '/drive/Drives partagés/Projet Transalp/Test 1',
                'salt' => '$2y$12$7fq4ajTQMXaInvDL6Pr3.OaFyLPyZvv61UVKvpc9S0C4jsqqJvlQu',
                'private' => 0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path' => '/drive/Drive d\'équipe/renommage/Test',
                'salt' => '$2y$12$kru1ACJzn7ZorPoEs9PCQeZcltHC5ouVLSzLdDs7r/zIPi56OKNSG',
                'private' => 0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path' => '/drive/Drive',
                'salt' => '$2y$12$9YlJt9ZKByJ6/mXijso.yunTygnW0fdRPnV8o1o8AsbOdauRm2vwC',
                'private' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'path' => '/drive/Drives partagés/yeeeeah/styhstyhsrt',
                'salt' => '$2y$12$/0wIEuZZF8TvVWNvS2GvE.kxUHczrIfJRiaAcwyiD5uO2R3Kd9PB.',
                'private' => 0,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        Drive_shared_path::insert($list);
    }
}
