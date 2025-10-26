<?php

namespace Database\Seeders\Core;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function createSector(string $name_sector) {
        DB::table('sector_companies')->insert([
            'name' => $name_sector
        ]);
    }
    public function run(): void
    {
        $sectors = [
            'Tecnología',
            'Startup Tecnológica',
            'Fintech',
            'E-commerce',
            'Desarrollo de Software',
            'Consultoría IT',
            'Ciberseguridad',

            'Financiero',
            'Banca',
            'Seguros',
            'Inversiones',
            'Contadora/Contabilidad',
            'Auditoría',
            'Asesoría Fiscal',

            'Salud',
            'Farmacéutica',
            'Biotecnología',
            'Clínicas y Hospitales',
            'Laboratorios',
            'Dispositivos Médicos',

            'Educación',
            'EdTech',
            'Capacitación Corporativa',
            'Universidad/Instituto',

            'Manufactura',
            'Automotriz',
            'Textil',
            'Alimentos y Bebidas',
            'Química',
            'Construcción',
            'Metalmecánica',

            'Retail/Comercio',
            'Supermercados',
            'Tiendas Departamentales',
            'Moda y Accesorios',

            'Servicios',
            'Consultoría de Negocios',
            'Recursos Humanos',
            'Marketing y Publicidad',
            'Agencia Digital',
            'Relaciones Públicas',
            'Legal/Jurídico',
            'Logística y Transporte',
            'Courier/Mensajería',

            'Inmobiliario',
            'Desarrollo Inmobiliario',
            'Administración de Propiedades',
            'Bienes Raíces',

            'Energía',
            'Petróleo y Gas',
            'Energías Renovables',
            'Utilities/Servicios Públicos',

            'Medios y Entretenimiento',
            'Televisión',
            'Radio',
            'Producción Audiovisual',
            'Editorial',
            'Streaming',
            'Gaming',

            'Turismo y Hospitalidad',
            'Hotelería',
            'Agencia de Viajes',
            'Restaurantes',
            'Catering',

            'Agricultura',
            'Agroindustria',
            'Ganadería',
            'Pesca',

            'Telecomunicaciones',
            'Operador Móvil',
            'ISP (Proveedor de Internet)',

            'Minería',
            'Investigación y Desarrollo',
            'ONG/Sin Fines de Lucro',
            'Gobierno',
            'Reportería/Medios de Comunicación',
            'Otros',
        ];

        foreach($sectors as $sector) {
            $this->createSector($sector);
        }
        //
    }
}
