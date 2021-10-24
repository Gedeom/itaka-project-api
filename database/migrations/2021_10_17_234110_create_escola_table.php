<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEscolaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('escola', function (Blueprint $table) {
            $table->increments('id');
            $table->string('escola');
            $table->unsignedInteger('logradouro_id');
            $table->string('numero_lograd');
            $table->string('complemento_lograd')->nullable();
            $table->timestamps();

            $table->foreign('logradouro_id','fk_escola_logradouro_foreign')->references('id')->on('logradouro');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escola');
    }
}
