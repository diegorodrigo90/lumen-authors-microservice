<?php

namespace Database\Seeders;

use Database\Seeders\AuthorSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->info("Authors database starting seeding.");
        $this->call([AuthorSeeder::class]);
        $this->command->info("Authors database seeded.");

    }
}
