<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeDocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            "curriculum vitae",
            "carta solicitud",
            "historial academico",
            "carnet de identidad",
            "convocatoria",
            "reporte",
        ];

        foreach($types as $type) {
            DB::table("type_documents")->insert([
                "name" => $type
            ]);
        }


    }
}
