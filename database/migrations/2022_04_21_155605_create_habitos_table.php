<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitos', function (Blueprint $table) {
            $table->id();
            $table->text('alimenticio');
            $table->text('defecatorio');
            $table->text('urinario');
            $table->text('actividad_fisica');
            $table->string('tiempo');
            $table->string('frecuencia');
            $table->text('otros');
            $table->unsignedBigInteger('anamnesis_id');
            $table->foreign('anamnesis_id')->references('id')->on('anamneses');
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
        Schema::dropIfExists('habitos');
    }
}
