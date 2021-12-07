<?php

namespace Database\Factories;

use App\Models\Escola;
use App\Models\Escolaridade;
use App\Models\Pessoa;
use App\Models\PessoaCondicaoSocial;
use App\Models\PessoaEscolaridade;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaEscolaridadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = PessoaEscolaridade::class;

    public function definition()
    {
        return [
            'data' => $this->faker->date,
            'pessoa_id' => $this->faker->numberBetween(Pessoa::min('id'),Pessoa::max('id')),
            'escola_id' => $this->faker->numberBetween(Escola::min('id'),Escola::max('id')),
            'serie' => null,
            'turma' => null,
            'escolaridade_id' => $this->faker->numberBetween(Escolaridade::min('id'),Escolaridade::max('id')),
        ];
    }
}
