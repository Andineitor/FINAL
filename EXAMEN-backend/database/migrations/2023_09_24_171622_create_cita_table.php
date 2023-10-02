<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('especialidad_id');
            $table->unsignedBigInteger('paciente_id');
          

            $table->timestamps();

            //relaciones


            //uno a muchos
            $table->foreign('especialidad_id')
                ->references('id')
                ->on('especialidades')
                ->onDelete('cascade')
                ->onUpdate('cascade');



            $table->foreign('paciente_id')
                ->references('id')
                ->on('pacientes')
                ->onDelete('cascade')
                ->onUpdate('cascade');




        });




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};