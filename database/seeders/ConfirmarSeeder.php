<?php

namespace Database\Seeders;

use App\Models\Confirmar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfirmarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Confirmar::create([
            'confirma' => 'Si'
        ]);

        Confirmar::create([
            'confirma' => 'No'
        ]);
    }
}
