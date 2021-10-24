<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('uf');
            $table->integer('ibge');
            $table->unsignedInteger('pais_id')->nullable();
            $table->string('ddd')->nullable();
            $table->timestamps();

            $table->foreign('pais_id','fk_estado_pais_foreign')->references('id')->on('pais');
        });

        $seed = new \Database\Seeders\EstadoSeeder();
        $seed->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estado');
    }
}
