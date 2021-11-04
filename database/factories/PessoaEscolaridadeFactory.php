<?php

namespace Database\Factories;

use App\Models\Escola;
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
        $escolaridades = ['Ensino Superior Completo', 'Superior Incompleto','Ensino Médio Completo','Ensino Médio Incompleto','Ensino Fundamental Completo','Ensino Fundamental Incompleto'];

        return [
            'data' => $this->faker->date,
            'pessoa_id' => $this->faker->numberBetween(Pessoa::min('id'),Pessoa::max('id')),
            'escola_id' => $this->faker->numberBetween(Escola::min('id'),Escola::max('id')),
            'serie' => null,
            'turma' => null,
            'escolaridade' => $this->faker->randomElement($escolaridades)
        ];
    }
}
