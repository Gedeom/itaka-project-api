<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaSitTrabalhistaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_sit_trabalhista', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('sit_trabalhista_id');
            $table->timestamps();

            $table->foreign('pessoa_id','fk_pessoa_sit_trabalhista_pessoa_foreign')->references('id')->on('pessoa');
            $table->foreign('sit_trabalhista_id','fk_pessoa_sit_trabalhista_sit_trabalhista_foreign')->references('id')->on('sit_trabalhista');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_sit_trabalhista');
    }
}
