<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaCondicaoSocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_condicao_social', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('condicao_social_id');
            $table->string('resposta');
            $table->string('descricao')->nullable();
            $table->timestamps();

            $table->foreign('pessoa_id','fk_pessoa_condicao_social_pessoa_foreign')->references('id')->on('pessoa');
            $table->foreign('condicao_social_id','fk_pessoa_condicao_social_condicao_social_foreign')->references('id')->on('condicao_social');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_condicao_social');
    }
}
