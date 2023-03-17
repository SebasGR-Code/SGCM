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
        Schema::create('generals', function (Blueprint $table) {
            $table->id();
            $table->text('motivo');
            $table->text('alergicos')->nullable();
            $table->text('quirurgicos')->nullable();
            $table->text('otros')->nullable();

            $table->boolean('fiebre')->nullable();
            $table->boolean('tos')->nullable();
            $table->boolean('cansancio')->nullable();
            $table->boolean('dolor_garganta')->nullable();
            $table->boolean('dolor_cabeza')->nullable();
            $table->boolean('perdida')->nullable();
            $table->boolean('dificultad')->nullable();
            $table->text('sintoma_otro')->nullable();

            $table->text('aspecto_general')->nullable();
            $table->double('peso')->nullable();
            $table->double('talla')->nullable();
            $table->string('tension_arterial')->nullable();
            $table->double('frecuencia_cardiaca')->nullable();
            $table->double('frecuencia_respiratoria')->nullable();
            $table->double('masa_corporal')->nullable();
            $table->double('temperatura')->nullable();

            $table->text('cabeza_cuello')->nullable();
            $table->text('ojos')->nullable();
            $table->text('cardiaco')->nullable();
            $table->text('pulmonar')->nullable();
            $table->text('abdomen')->nullable();
            $table->text('mental')->nullable();

            $table->text('diagnostico_principal');
            $table->text('analisis_plan');
            
            $table->unsignedBigInteger('cita_id');
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
        Schema::dropIfExists('generals');
    }
};
