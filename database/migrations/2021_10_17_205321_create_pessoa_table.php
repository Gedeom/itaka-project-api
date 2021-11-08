<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoa', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dt_criacao');
            $table->string('nome');
            $table->unsignedInteger('sexo_id');
            $table->date('dt_nascimento');
            $table->string('doc',20);
            $table->string('rg',20)->nullable();
            $table->string('rg_orgao_expedidor',20)->nullable();
            $table->unsignedInteger('naturalidade_id');
            $table->unsignedInteger('etnia_id');
            $table->string('email')->nullable();
            $table->string('tel_residencia')->nullable();
            $table->string('tel_recado')->nullable();
            $table->string('tel_celular')->nullable();
            $table->string('tel_emerg1')->nullable();
            $table->string('tel_emerg2')->nullable();
            $table->string('nome_contato_emerg')->nullable();
            $table->string('alergia',1000)->nullable();
            $table->string('sit_medica_especial',1000)->nullable();
            $table->string('medicacao_controlada',1000)->nullable();
            $table->string('fratura_cirurgia',1000)->nullable();
            $table->string('recomendacao_emergencia_med',1000)->nullable();
            $table->decimal('renda',15,2)->default(0);
            $table->timestamps();

            $table->foreign('sexo_id','fk_pessoa_sexo_foreign')->references('id')->on('sexo');
            $table->foreign('naturalidade_id','fk_pessoa_cidade_foreign')->references('id')->on('cidade');
            $table->foreign('etnia_id','fk_pessoa_etnia_foreign')->references('id')->on('etnia');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pessoa');
    }
}
