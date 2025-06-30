<?php

namespace Database\Seeders;

use App\Models\Sosmed;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil UserSeeder
        $this->call([
            UserSeeder::class,
            ContactSeeder::class,
            SocialAccountSeeder::class,
        ]);
    }
}
