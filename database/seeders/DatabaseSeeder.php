<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EntitiesSeeder::class,
            RolesSeeder::class,
            CategoriesSeeder::class,
            ProductsSeeder::class,
            ApiTokensSeeder::class,
            ArticlesSeeder::class,
            DriveSharedPathsSeeder::class,
            UsersSeeder::class,
            DriveRelationsSeeder::class,
            EmailsSeeder::class,
            NewsletterEmailsSeeder::class,
            SettingsSeeder::class,
            EventsSeeder::class
        ]);
    }
}
