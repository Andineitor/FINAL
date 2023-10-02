<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('descripcion')->nullable();

            //foraneas
            $table->unsignedBigInteger('vehiculos_id');
            $table->unsignedBigInteger('clientes_id');

            $table->timestamps();



            
            //relaciones


            //uno a muchos
            $table->foreign('vehiculos_id')
                ->references('id')
                ->on('vehiculos')
                ->onDelete('cascade')
                ->onUpdate('cascade');



            $table->foreign('clientes_id')
                ->references('id')
                ->on('clientes')
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
        Schema::dropIfExists('reservas');
    }
};
