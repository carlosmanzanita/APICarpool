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
        Tag::create([
            'nombre' => 'Pa la gas',
            'descripcion' => 'Cooperación voluntaria para la gasolina del vehículo',
        ]);
        Tag::create([
            'nombre' => 'No fumar',
            'descripcion' => 'No se permite fumar dentro del vehículo',
        ]);
        Tag::create([
            'nombre' => 'No consumibles',
            'descripcion' => 'No se permite consumir alimentos ni bebidas dentro del vehículo',
        ]);
        Tag::create([
            'nombre' => 'Limpieza',
            'descripcion' => 'Por favor, no dejes basura en el vehículo',
        ]);
        Tag::create([
            'nombre' => 'Tortuga',
            'descripcion' => 'Este usuario se toma su tiempo al conducir, tomalo en cuenta',
        ]);
        Tag::create([
            'nombre' => 'Toretto',
            'descripcion' => 'Este usuario suele manejar rápido, tomalo en cuenta',
        ]);
        
    }
}
