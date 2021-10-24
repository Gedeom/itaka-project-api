<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaEscolaridadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_escolaridade', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('escola_id')->nullable();
            $table->string('serie')->nullable();
            $table->string('turma')->nullable();
            $table->string('escolaridade');
            $table->timestamps();

            $table->foreign('pessoa_id','fk_pessoa_escolaridade_pessoa_foreign')->references('id')->on('pessoa');
            $table->foreign('escola_id','fk_pessoa_escolaridade_escola_foreign')->references('id')->on('escola');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_escolaridade');
    }
}
