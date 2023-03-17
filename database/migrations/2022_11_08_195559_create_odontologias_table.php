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
        Schema::create('odontologias', function (Blueprint $table) {
            $table->id();
            $table->text('motivo');
            $table->text('alergicos')->nullable();
            $table->text('quirurgicos')->nullable();
            $table->text('otros')->nullable();
            $table->text('labios')->nullable();
            $table->text('carrillos')->nullable();
            $table->text('lengua')->nullable();
            $table->text('glandulas_salivares')->nullable();
            $table->text('paladar')->nullable();
            $table->text('maxilares')->nullable();
            $table->text('piso_boca')->nullable();
            $table->text('sistema_glangionar')->nullable();
            $table->text('diagnostico_principal');
            $table->text('observaciones');

            $table->text('diente_11')->nullable();
            $table->text('diente_12')->nullable();
            $table->text('diente_13')->nullable();
            $table->text('diente_14')->nullable();
            $table->text('diente_15')->nullable();
            $table->text('diente_16')->nullable();
            $table->text('diente_17')->nullable();
            $table->text('diente_18')->nullable();

            $table->text('diente_21')->nullable();
            $table->text('diente_22')->nullable();
            $table->text('diente_23')->nullable();
            $table->text('diente_24')->nullable();
            $table->text('diente_25')->nullable();
            $table->text('diente_26')->nullable();
            $table->text('diente_27')->nullable();
            $table->text('diente_28')->nullable();

            $table->text('diente_31')->nullable();
            $table->text('diente_32')->nullable();
            $table->text('diente_33')->nullable();
            $table->text('diente_34')->nullable();
            $table->text('diente_35')->nullable();
            $table->text('diente_36')->nullable();
            $table->text('diente_37')->nullable();
            $table->text('diente_38')->nullable();

            $table->text('diente_41')->nullable();
            $table->text('diente_42')->nullable();
            $table->text('diente_43')->nullable();
            $table->text('diente_44')->nullable();
            $table->text('diente_45')->nullable();
            $table->text('diente_46')->nullable();
            $table->text('diente_47')->nullable();
            $table->text('diente_48')->nullable();

            $table->text('diente_51')->nullable();
            $table->text('diente_52')->nullable();
            $table->text('diente_53')->nullable();
            $table->text('diente_54')->nullable();
            $table->text('diente_55')->nullable();

            $table->text('diente_61')->nullable();
            $table->text('diente_62')->nullable();
            $table->text('diente_63')->nullable();
            $table->text('diente_64')->nullable();
            $table->text('diente_65')->nullable();

            $table->text('diente_71')->nullable();
            $table->text('diente_72')->nullable();
            $table->text('diente_73')->nullable();
            $table->text('diente_74')->nullable();
            $table->text('diente_75')->nullable();

            $table->text('diente_81')->nullable();
            $table->text('diente_82')->nullable();
            $table->text('diente_83')->nullable();
            $table->text('diente_84')->nullable();
            $table->text('diente_85')->nullable();

            $table->integer('edad');

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
        Schema::dropIfExists('odontologias');
    }
};
