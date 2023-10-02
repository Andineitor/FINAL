<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehiculos>
 */
class VehiculosFactory extends Factory
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
            "marca"=>$this->faker->name,
            "modelo"=> $this->faker->name,
            "año_fabricacion"=>$this->faker->date(), 
            "placa"=>$this->faker->name,
            "color"=>$this->faker->colorName,
            "tipo_vehiculo"=>$this->faker->name,
            "kilometraje"=>$this->faker->randomNumber(4),
            "descripcion"=>$this->faker->text,
        ];
    }
}
