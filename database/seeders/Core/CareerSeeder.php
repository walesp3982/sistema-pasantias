<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $carrers = [
            'Ciencias de la educación',
            'Ingenieria de Sistemas',
            'Contaduría Pública',
            'Derecho',
            'Psicomotricidad, Salud, Education y Deportes',
            'Técnico Superior en Educación Parvularia',
            'Técnica Superior en Educación Especial Inclusiva',
            'Técnico Superior en Pedagagía de Atención al Adulto Mayor',
            'Ingeniería Comercial y Desarrollo de Negocios',
            'Gastronomia y Gestión de Restaurantes'
        ];

        foreach ($carrers as $career) {
            DB::table('carrers')->insert([
                'name' => $career
            ]);
        }
    }
}
