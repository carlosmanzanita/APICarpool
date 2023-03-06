<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Destinoemergente;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ModalidadSeeder::class);
        $this->call(AlumnosSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(AutoSeeder::class);
        $this->call(PanicoSeeder::class);
        $this->call(DestinoSeeder::class);
        $this->call(EncuentroSeeder::class);
        $this->call(DestinoemergenteSeeder::class);
        $this->call(AventonSeeder::class);
        $this->call(ConfirmarSeeder::class);
        $this->call(PieSeeder::class);
        $this->call(AventonTagSeeder::class);
        $this->call(PieTagSeeder::class);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
