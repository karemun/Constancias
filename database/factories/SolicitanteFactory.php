<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Solicitante>
 */
class SolicitanteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->name,
            'email' => $this->faker->email,
            'codigo' => $this->faker->optional()->randomNumber(9),
            'evento_id' => function () {
                return \App\Models\Evento::factory()->create()->id;
            },
        ];
    }
}
