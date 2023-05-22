<?php

namespace Database\Seeders;

use App\Models\Evento;
use App\Models\Solicitante;
use App\Models\Participante;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Crear eventos
        $eventos = Evento::factory()->count(15)->create();

        foreach ($eventos as $evento) {
            // Crear un solicitante para cada evento
            Solicitante::factory()->create([
                'evento_id' => $evento->id,
            ]);

            // Crear varios participantes para cada evento
            Participante::factory()->count(3)->create([
                'evento_id' => $evento->id,
            ]);
        }
    }
}
