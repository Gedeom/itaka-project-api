<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaCondicaoMoradiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_condicao_moradia', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedInteger('endereco_pessoa_id');
            $table->unsignedInteger('condicao_moradia_id');
            $table->string('resposta');
            $table->string('descricao')->nullable();
            $table->timestamps();

            $table->foreign('endereco_pessoa_id','fk_pessoa_condicao_moradia_pessoa_endereco_foreign')->references('id')->on('pessoa_endereco');
            $table->foreign('condicao_moradia_id','fk_pessoa_condicao_moradia_condicao_moradia_foreign')->references('id')->on('condicao_moradia');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_condicao_moradia');
    }
}
