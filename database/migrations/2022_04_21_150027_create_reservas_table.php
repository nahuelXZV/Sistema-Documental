<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
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
            $table->date('fecha_creacion');
            $table->date('fecha_reserva');
            $table->unsignedBigInteger('ficha_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('consulta_id')->nullable();
            $table->foreign('ficha_id')->references('id')->on('fichas');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('reservas');
    }
}
