<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaDespesaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa_despesa', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->unsignedInteger('pessoa_id');
            $table->unsignedInteger('despesa_id');
            $table->decimal('vlr',15,2)->default(0);
            $table->string('observacoes',1000)->nullable();
            $table->timestamps();

            $table->foreign('pessoa_id','fk_pessoa_despesa_pessoa_foreign')->references('id')->on('pessoa');
            $table->foreign('despesa_id','fk_pessoa_despesa_despesa_foreign')->references('id')->on('despesa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa_despesa');
    }
}
