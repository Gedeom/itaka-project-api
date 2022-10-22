<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogradouroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logradouro', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('cep');
            $table->unsignedInteger('bairro_id');
            $table->timestamps();

            $table->foreign('bairro_id','fk_logradouro_bairro_foreign')->references('id')->on('bairro');
        });


        $seed = new \Database\Seeders\LogradouroSeeder();
        $seed->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logradouro');
    }
}
