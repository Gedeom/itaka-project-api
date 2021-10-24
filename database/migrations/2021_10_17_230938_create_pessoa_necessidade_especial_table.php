<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaNecessidadeEspecialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_necessidade_especial', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('necessidade_especial_id');
            $table->timestamps();

            $table->foreign('pessoa_id','fk_pessoa_necessidade_especial_pessoa_foreign')->references('id')->on('pessoa');
            $table->foreign('necessidade_especial_id','fk_pessoa_necessidade_especial_necessidade_especial_foreign')->references('id')->on('necessidade_especial');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_necessidade_especial');
    }
}
