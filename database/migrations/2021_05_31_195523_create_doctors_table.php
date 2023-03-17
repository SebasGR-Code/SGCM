<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('tipo_identificacion');
            $table->string('num_identificacion');
            $table->string('rh');
            $table->string('genero');
            $table->string('especialidad');
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('user_id')->unique();
            $table->unsignedBigInteger('sala_id')->nullable()->unique();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
