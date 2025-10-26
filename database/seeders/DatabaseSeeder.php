<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\Core\CareerSeeder;
use Database\Seeders\Core\ChannelsSeeder;
use Database\Seeders\Core\PermissionSeeder;
use Database\Seeders\Core\SectorCompaniesSeeder;
use Database\Seeders\Core\TypeDocumentsSeeder;
use Database\Seeders\Core\TypeReportsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    use WithoutModelEvents;
    public function run(): void
    {
        $this->call([
            // Obligatoty for functionality system
            ChannelsSeeder::class,
            CareerSeeder::class,
            PermissionSeeder::class,
            SectorCompaniesSeeder::class,
            TypeDocumentsSeeder::class,
            TypeReportsSeeder::class,
            WorldSeeder::class
            // Seeder for testing
        ]);
        // User::factory(10)->create();


    }
}
