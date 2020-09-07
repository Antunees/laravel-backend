<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->string('responsavel');
            $table->enum('status', ['aberto', 'concluído'])->default('aberto');
            $table->unsignedInteger('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipo_atividades')->onDelete('cascade');
            $table->date('inicio')->nullable();
            $table->date('prazo')->nullable();
            $table->date('conclusao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atividades');
    }
}
