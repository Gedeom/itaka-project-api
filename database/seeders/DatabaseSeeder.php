<?php

namespace Database\Seeders;

use App\Models\Escola;
use App\Models\NecessidadeEspecial;
use App\Models\Pessoa;
use App\Models\PessoaCondicaoMoradia;
use App\Models\PessoaCondicaoSocial;
use App\Models\PessoaDespesa;
use App\Models\PessoaEndereco;
use App\Models\PessoaEscolaridade;
use App\Models\PessoaEstadoCivil;
use App\Models\PessoaGrupoFamiliar;
use App\Models\PessoaNecessidadeEspecial;
use App\Models\PessoaSitTrabalhista;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Pessoa::factory(50)->create();
        Escola::factory(50)->create();
        PessoaGrupoFamiliar::factory(50)->create();
        PessoaEndereco::factory(50)->create();
        PessoaCondicaoMoradia::factory(50)->create();
        PessoaCondicaoSocial::factory(50)->create();
        PessoaDespesa::factory(50)->create();
        PessoaEscolaridade::factory(50)->create();
        PessoaEstadoCivil::factory(50)->create();
        PessoaNecessidadeEspecial::factory(50)->create();
        PessoaSitTrabalhista::factory(50)->create();

    }
}
