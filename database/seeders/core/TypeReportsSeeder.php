<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "inasistencia",
            "mala conducta",
            "accidente laboral",
            "falta concurrente",
        ];

        foreach($types as $type) {
            DB::table("type_reports")->insert([
                "name" => $type
            ]);
        }
    }
}
