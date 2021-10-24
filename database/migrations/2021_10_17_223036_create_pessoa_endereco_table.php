<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('logradouro_id');
            $table->string('numero_lograd');
            $table->string('complemento_lograd')->nullable();
            $table->timestamps();

            $table->foreign('pessoa_id','fk_pessoa_endereco_pessoa_foreign')->references('id')->on('pessoa');
            $table->foreign('logradouro_id','fk_pessoa_endereco_logradouro_foreign')->references('id')->on('logradouro');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_endereco');
    }
}
