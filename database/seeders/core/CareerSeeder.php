<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\Career;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
{
    public function newCarrer(string $name_career) {
        DB::table('careers')->insert([
            'name' => $name_career
        ]);
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Career::cases() as $career) {
            $this->newCarrer($career->value);
        }
        // Agregar si existe más en App\Enums\Career enum...

    }
}
