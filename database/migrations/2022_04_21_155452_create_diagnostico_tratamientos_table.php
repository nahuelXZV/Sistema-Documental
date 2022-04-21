<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosticoTratamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico_tratamientos', function (Blueprint $table) {
            $table->id();
            $table->text('principal');
            $table->text('secundario')->nullable();
            $table->text('justificacion')->nullable();
            $table->text('tratamiento')->nullable();
            $table->text('plan_trabajo')->nullable();
            $table->unsignedBigInteger('consulta_id');
            $table->foreign('consulta_id')->references('id')->on('consultas');
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
        Schema::dropIfExists('diagnostico_tratamientos');
    }
}
