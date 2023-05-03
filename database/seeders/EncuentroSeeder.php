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
            'nombre' => 'punto de encuentro 1',
            'descripcion' => 'Edificio de Gobierno',
            'latitud' => '19.328857911610612',
            'longitud' => '-99.11092798763877',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'nombre' => 'punto de encuentro 2',
            'descripcion' => 'Salida Av. Santa Ana',
            'latitud' => ' 19.328517007701326',
            'longitud' => '--99.11286010122016',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'nombre' => 'punto de encuentro 1',
            'descripcion' => 'Edificio de Gobierno',
            'latitud' => '19.328857911610612',
            'longitud' => '-99.11092798763877',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'nombre' => 'punto de encuentro 1',
            'descripcion' => 'Edificio de Gobierno',
            'latitud' => '19.328857911610612',
            'longitud' => '-99.11092798763877',
            'tipo' => 'A pie'
        ]);
        Encuentro::create([
            'nombre' => 'punto de encuentro 1',
            'descripcion' => 'Edificio de Gobierno',
            'latitud' => '19.328857911610612',
            'longitud' => '-99.11092798763877',
            'tipo' => 'A pie'
        ]);
    }
}
