<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaEstadoCivilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_estado_civil', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('estado_civil_id');
            $table->timestamps();

            $table->foreign('pessoa_id','fk_pessoa_estado_civil_pessoa_foreign')->references('id')->on('pessoa');
            $table->foreign('estado_civil_id','fk_pessoa_estado_civil_estado_civil_foreign')->references('id')->on('estado_civil');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_estado_civil');
    }
}
