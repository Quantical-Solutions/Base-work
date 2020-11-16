<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
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
                'name' => '&Eacute;vènements',
                'type' => 'events',
                'parent' => 0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Articles',
                'type' => 'articles',
                'parent' => 0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Presse',
                'type' => 'presse',
                'parent' => 0,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'IT',
                'type' => 'articles',
                'parent' => 2,
                'created_at' => $date,
                'updated_at' => $date
            ],
            [
                'name' => 'Développement',
                'type' => 'articles',
                'parent' => 2,
                'created_at' => $date,
                'updated_at' => $date
            ]
        ];
        Category::insert($list);
    }
}
