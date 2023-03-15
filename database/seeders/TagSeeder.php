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
            'icono' => '1'
        ]);
        Tag::create([
            'nombre' => 'No fumar',
            'descripcion' => 'Este usuario no permite fumar dentro de su vehículo',
            'icono' => '2'
        ]);
        Tag::create([
            'nombre' => 'No consumibles',
            'descripcion' => 'Este usuario no permite consumir alimentos ni bebidas dentro de su vehículo',
            'icono' => '3'
        ]);
        Tag::create([
            'nombre' => 'Limpieza',
            'descripcion' => 'Por favor, no dejes basura en el vehículo de este usuario',
            'icono' => '4'
        ]);
        Tag::create([
            'nombre' => 'Tortuga',
            'descripcion' => 'Este usuario se toma su tiempo al conducir, tomalo en cuenta',
            'icono' => '5'
        ]);
        Tag::create([
            'nombre' => 'Toretto',
            'descripcion' => 'Este usuario suele manejar rápido. Si le temes a la velocidad, tomalo en cuenta',
            'icono' => '6'
        ]);
    }
}
