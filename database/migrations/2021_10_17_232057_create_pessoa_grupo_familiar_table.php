<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaGrupoFamiliarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_grupo_familiar', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('parente_id');
            $table->unsignedInteger('parentesco_id');
            $table->timestamps();

            $table->foreign('pessoa_id','fk_pessoa_grupo_familiar_pessoa_foreign')->references('id')->on('pessoa');
            $table->foreign('parente_id','fk_pessoa_grupo_familiar_parente_id_foreign')->references('id')->on('pessoa');
            $table->foreign('parentesco_id','fk_pessoa_grupo_familiar_parentesco_id_foreign')->references('id')->on('parentesco');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_grupo_familiar');
    }
}
