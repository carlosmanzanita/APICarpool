<?php

namespace Database\Seeders;

use App\Models\PieTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PieTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PieTag::create([
            'nombre' => 'Tolerancia',
            'descripcion' => '5 min de tolerancia',
        ]);
        PieTag::create([
            'nombre' => 'Tolerancia',
            'descripcion' => '10 min de tolerancia',
        ]);
        PieTag::create([
            'nombre' => 'Tolerancia',
            'descripcion' => '15 min de tolerancia',
        ]);
    }
}
