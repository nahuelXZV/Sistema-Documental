<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            
            $table->string('tipo_documento');
            $table->string('documento');
            $table->string('nombre');
            $table->string('fecha_nacimiento');
            $table->string('sexo');

            $table->string('pais');
            $table->string('departamento');
            $table->string('distrito');
            $table->string('nacionalidad');
            $table->string('estado_civil');

            $table->string('nivel_educativo');
            $table->string('año_cursado');

            $table->string('seguro_medico');
            $table->string('situacion_laboral');

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
        Schema::dropIfExists('pacientes');
    }
}
