<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence,
            'tipo' => $this->faker->randomElement(['Conferencia', 'Taller', 'Seminario']),
            'departamento' => $this->faker->word,
            'ubicacion' => $this->faker->address,
            'fecha_inicio' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'fecha_final' => $this->faker->dateTimeBetween('+2 weeks', '+3 weeks'),
            'material' => $this->faker->text,
            'folio' => $this->faker->unique()->randomNumber(),
        ];
    }
}
