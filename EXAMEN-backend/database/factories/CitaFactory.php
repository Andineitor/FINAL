<?php

namespace Database\Factories;

use App\Models\Especialidad;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cita>
 */
class CitaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "codigo"=> $this->faker->numberBetween(1000, 9999),
            "descripcion" =>$this->faker->text,
            'paciente_id' => Paciente::factory(),  // Esto creará un nuevo paciente para cada cita
            'especialidad_id' => Especialidad::factory(),
        ];
    }
}
