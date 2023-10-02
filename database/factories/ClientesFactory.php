<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clientes>
 */
class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "nombre" => $this->faker->name,
            "cedula" => $this->faker->numberBetween(1000000000, 9999999999),
            "apellido" => $this->faker->lastName,
            "ciudad" => $this->faker->city,
            "email" => $this->faker->email,
            "direccion" => $this->faker->address,

            "telefono" => $this->faker->phoneNumber,

            "fecha_nacimiento" => $this->faker->date(),


        ];
    }
}