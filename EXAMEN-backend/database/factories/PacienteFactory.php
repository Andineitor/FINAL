<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nombre"=> $this->faker->name,
            "apellido"=>$this->faker->lastName,
            "cedula"=>$this->faker->numberBetween(1000000000,9999999999),
            "fecha_nacimiento"=>$this->faker->date(),    
            "genero"=>$this->faker->randomElement(['M','F']),
            "ciudad"=>$this->faker->city,
            "direccion"=>$this->faker->address,
            "telefono"=>$this->faker->phoneNumber,
            "email"=>$this->faker->email,
          
           
        ];
    }
}
