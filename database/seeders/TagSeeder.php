<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create([
            'nombre' => 'Pa la gas',
            'descripcion' => 'Este usuario pide una cooperación voluntaria para la gasolina de su vehículo',
        ]);
        Tag::create([
            'nombre' => 'No fumar',
            'descripcion' => 'Este usuario no permite fumar dentro de su vehículo',
        ]);
        Tag::create([
            'nombre' => 'No consumibles',
            'descripcion' => 'Este usuario no permite consumir alimentos ni bebidas dentro de su vehículo',
        ]);
        Tag::create([
            'nombre' => 'Limpieza',
            'descripcion' => 'Por favor, no dejes basura en el vehículo de este usuario',
        ]);
        Tag::create([
            'nombre' => 'Tortuga',
            'descripcion' => 'Este usuario se toma su tiempo al conducir, tomalo en cuenta',
        ]);
        Tag::create([
            'nombre' => 'Toretto',
            'descripcion' => 'Este usuario suele manejar rápido. Si le temes a la velocidad, tomalo en cuenta',
        ]);
        Tag::create([
            'nombre' => '5 minutos',
            'descripcion' => 'Tiempo de tolerancia',
        ]);
        Tag::create([
            'nombre' => '10 minutos',
            'descripcion' => 'Tiempo de tolerancia',
        ]);
        Tag::create([
            'nombre' => '15 minutos',
            'descripcion' => 'Tiempo de tolerancia',
        ]);
    }
}
