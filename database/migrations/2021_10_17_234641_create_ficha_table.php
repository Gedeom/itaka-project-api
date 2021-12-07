<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->integer('numero');
            $table->unsignedInteger('situacao_id');
            $table->unsignedInteger('candidato_id');
            $table->unsignedInteger('responsavel_id')->nullable();
            $table->unsignedInteger('resp_parentesco_id')->nullable();
            $table->boolean('processo_is_deferido');
            $table->string('parecer_assistente_social',2000)->nullable();
            $table->string('outros_gastos',2000)->nullable();
            $table->string('situacao_socieconomica_familiar',2000)->nullable();
            $table->string('obs_nescessarias',2000)->nullable();
            $table->timestamps();

            $table->foreign('situacao_id','fk_ficha_ficha_situacao_foreign')->references('id')->on('ficha_situacao');
            $table->foreign('candidato_id','fk_ficha_candidato_foreign')->references('id')->on('pessoa');
            $table->foreign('responsavel_id','fk_ficha_responsavel_foreign')->references('id')->on('pessoa');
            $table->foreign('resp_parentesco_id','fk_ficha_parentesco_foreign')->references('id')->on('parentesco');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha');
    }
}
