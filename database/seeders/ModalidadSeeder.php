<?php

namespace Database\Seeders;

use App\Models\Modalidad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modalidad::create([
            'nombre' => 'General',
            'descripcion' => 'Se permite el abordaje de cualquier persona',
        ]);
        Modalidad::create([
            'nombre' => 'Solo Mujeres',
            'descripcion' => 'Se permite el abordaje a solo mujeres',
        ]);
        Modalidad::create([
            'nombre' => 'Solo Hombres',
            'descripcion' => 'Se permite el abordaje a solo hombres',
        ]);

    }
}
