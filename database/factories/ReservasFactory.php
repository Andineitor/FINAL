<?php

namespace Database\Factories;

use App\Models\Clientes;
use App\Models\Vehiculos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reservas>
 */
class ReservasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            "codigo"=> $this->faker->numberBetween(1000, 9999),
            "descripcion" =>$this->faker->text,
            'vehiculos_id' => Vehiculos::factory(),  // Esto creará un nuevo paciente para cada cita
            'clientes_id' => Clientes::factory(),
        ];
    }
}
