<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("paciente_id");
            $table->foreign("paciente_id")->references("id")->on("pacientes")->onUpdate('cascade');
            $table->unsignedBigInteger("medico_id");
            $table->foreign("medico_id")->references("id")->on("medicos")->onUpdate('cascade');
            $table->unsignedBigInteger("status_id");
            $table->foreign("status_id")->references("id")->on("status_agendamentos")->onUpdate('cascade');
            $table->dateTime("horario");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
