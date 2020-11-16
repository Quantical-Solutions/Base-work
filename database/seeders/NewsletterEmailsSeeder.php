<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Newsletter_email;

class NewsletterEmailsSeeder extends Seeder
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
                'email' => 'in-touch-fg@quanticalsolutions.com',
                'entity_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'email' => 'in-touch-ml@quanticalsolutions.com',
                'entity_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'email' => 'in-touch-lp@quanticalsolutions.com',
                'entity_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'email' => 'in-touch-dp@quanticalsolutions.com',
                'entity_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'email' => 'in-touch-ik@quanticalsolutions.com',
                'entity_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'email' => 'fred.geffray@gmail.com',
                'entity_id' => 1,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        Newsletter_email::insert($list);
    }
}
