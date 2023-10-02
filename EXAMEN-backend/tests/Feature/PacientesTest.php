<?php

namespace Tests\Feature;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PacienteTest extends TestCase
{
    use RefreshDatabase;


    // Esto nos permite usar datos falsos.
    use WithFaker;

    /** @test */

    public function paciente_registrado()
    {
        // Actúa como un usuario autenticado
        $user = User::factory()->create();
        $this->actingAs($user);

        //data del paciente con el que trabajaremos en las pruebas
        //se crea de forma manual, ya que los aleatorios crea usuarios 
        //con parametros que tenemos restringiudos en los controladores 
        $paciente = [
            'id' => 1,
            'nombre' => 'Dianna Rau',
            'apellido' => 'Conroy',
            'cedula' => '4024108485',
            'fecha_nacimiento' => '1975-05-31',
            'genero' => 'F',
            'ciudad' => 'Ullrichbury',
            'direccion' => '927 Buckridge Ridge Suite 345\nWolffort, OH 94147-8310',
            'telefono' => '(313) 239-0717',
            'email' => 'price.walter@yahoo.com',
        ];

        // hacemos la petición POST
        $response = $this->postJson(route('pacientes.store'), $paciente);

        // Asegurarse que la respuesta es 200 OK y el paciente ha sido creado
        $response->assertStatus(200);
        // $this->assertDatabaseHas('pacientes', ['nombre' => $paciente['nombre']]);
    }


    /** @test */

    public function paciente_edit()
    {
        // Actúa como un usuario autenticado
        $user = User::factory()->create();
        $this->actingAs($user);

        $paciente = Paciente::factory()->create();

        $response = $this->deleteJson(route('pacientes.update', $paciente->id));

      $response->assertStatus(200);

    }

    /** @test */

    public function paciente_delete()
    {

        // Actúa como un usuario autenticado
        $user = User::factory()->create();
        $this->actingAs($user);

        $paciente = Paciente::factory()->create();


        // hacemos la petición DELETE
        $response = $this->deleteJson(route('pacientes.destroy', $paciente->id));

        // recivimos el codigo que esperamos y la confirmacion del paciente eliminado
        $response->assertStatus(200);
    }
}