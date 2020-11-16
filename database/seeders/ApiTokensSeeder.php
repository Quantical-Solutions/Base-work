<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Api_token as ApiToken;

class ApiTokensSeeder extends Seeder
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
                'entity_id' => 2,
                'product_id' => 2,
                'token' => '$single00account00',
                'single_site_mode' => 1,
                'site_domain' => 'www.ceseau.org', 'created_at' => $date, 'updated_at' => $date
            ],
            [
                'entity_id' => 1,
                'product_id' => 1,
                'token' => '$qs2019api00pro',
                'single_site_mode' => 0,
                'site_domain' => NULL, 'created_at' => $date, 'updated_at' => $date
            ],
            [
                'entity_id' => 3,
                'product_id' => 3,
                'token' => '$20ep19si91wi02s',
                'single_site_mode' => 0,
                'site_domain' => NULL, 'created_at' => $date, 'updated_at' => $date
            ],
            [
                'entity_id' => 1,
                'product_id' => 4,
                'token' => '$25df9De25gHtY',
                'single_site_mode' => 0,
                'site_domain' => NULL, 'created_at' => $date, 'updated_at' => $date
            ],
            [
                'entity_id' => 1,
                'product_id' => 5,
                'token' => '$Edy34tGRtf698nhGTf',
                'single_site_mode' => 0,
                'site_domain' => NULL, 'created_at' => $date, 'updated_at' => $date
            ]
        ];
        ApiToken::insert($list);
    }
}
