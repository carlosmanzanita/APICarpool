<?php

namespace Database\Seeders;

use App\Models\Encuentro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EncuentroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Encuentro::create([
            'nombre' => 'Edificio de Gobierno (Pie)',
            'descripcion' => 'Preferible Mod. Pie',
            'latitud' => '19.328857911610612',
            'longitud' => '-99.11092798763877',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'nombre' => 'Salida Av. Santa Ana (Pie)',
            'descripcion' => 'Mod. Pie/salida 1',
            'latitud' => ' 19.328517007701326',
            'longitud' => '--99.11286010122016',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'nombre' => 'Salida Cafetales (Pie)',
            'descripcion' => 'Mod. Pie/salida 3',
            'latitud' => '19.329180971835818',
            'longitud' => '-99.11035806788107',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'nombre' => 'Papelería Esime (Pie)',
            'descripcion' => 'Mod. Pie',
            'latitud' => '19.33012805142718',
            'longitud' => '-99.11279306474404',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'nombre' => 'Papelería ESIME, CAE (Pie)',
            'descripcion' => 'Mod. Pie',
            'latitud' => '19.33012805142718',
            'longitud' => '-99.11279306474404',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'nombre' => 'Estacionamiento 1(Aventon)',
            'descripcion' => 'Mod. Aventón',
            'latitud' => '19.32877644393895',
            'longitud' => '-99.11263676074815',
            'tipo' => 'Aventon'
        ]);
        Encuentro::create([
            'nombre' => 'Estacionamiento 2(Aventon)',
            'descripcion' => 'Mod. Aventón',
            'latitud' => '19.329302896469038',
            'longitud' => '-99.112567023313',
            'tipo' => 'Aventon'
        ]);
        Encuentro::create([
            'nombre' => 'Estacionamiento 3(Aveton)',
            'descripcion' => 'Mod. Aventón',
            'latitud' => '19.329804037205044',
            'longitud' => '--99.11258848098588',
            'tipo' => 'Aventon'
        ]);
        Encuentro::create([
            'nombre' => 'La higuera solar(pie)',
            'descripcion' => 'Mod. Aventón',
            'latitud' => '19.32860686511847',
            'longitud' => '-99.11263676074815',
            'tipo' => 'Aventon'
        ]);
    }
}
