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
            'id' => '1',
            'nombre' => 'punto de encuentro 1',
            'descripcion' => 'Edificio de Gobierno',
            'latitud' => '19.328857911610612',
            'longitud' => '-99.11092798763877',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'id' => '2',
            'nombre' => 'punto de encuentro 2',
            'descripcion' => 'Salida Av. Santa Ana',
            'latitud' => ' 19.328517007701326',
            'longitud' => '--99.11286010122016',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'id' => '3',
            'nombre' => 'punto de encuentro 3',
            'descripcion' => 'Salid Cafetales',
            'latitud' => '19.329180971835818',
            'longitud' => '-99.11035806788107',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'id' => '4',
            'nombre' => 'punto de encuentro 4',
            'descripcion' => 'Papelería ESIME',
            'latitud' => '19.33012805142718',
            'longitud' => '-99.11279306474404',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'id' => '5',
            'nombre' => 'punto de encuentro 5',
            'descripcion' => 'Estacionamiento 1',
            'latitud' => '19.32877644393895',
            'longitud' => '-99.11263676074815',
            'tipo' => 'Aventon'
        ]);
        Encuentro::create([
            'id' => '6',
            'nombre' => 'punto de encuentro 6',
            'descripcion' => 'Estacionamiento 2',
            'latitud' => '19.329302896469038',
            'longitud' => '-99.112567023313',
            'tipo' => 'Aventon'
        ]);
        Encuentro::create([
            'id' => '7',
            'nombre' => 'punto de encuentro 7',
            'descripcion' => 'Estacionamiento 3',
            'latitud' => '19.329804037205044',
            'longitud' => '--99.11258848098588',
            'tipo' => 'Aventon'
        ]);
        Encuentro::create([
            'id' => '8',
            'nombre' => 'punto de encuentro 8',
            'descripcion' => 'Las peras',
            'latitud' => '19.32860686511847',
            'longitud' => '-99.11263676074815',
            'tipo' => 'Aventon'
        ]);
    }
}
