<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\PessoaCondicaoSocial;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaCondicaoSocialFactory extends Factory
{
    protected $model = PessoaCondicaoSocial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $resp = $this->faker->randomElement(['Sim','Não']);

        return [
            'data' => $this->faker->date,
            'pessoa_id' => $this->faker->numberBetween(Pessoa::min('id'), Pessoa::max('id')),
            'condicao_social_id' => $this->faker->numberBetween(1,6),
            'resposta' => $resp,
            'descricao' => $resp === 'Sim' ? $this->faker->name : null
        ];
    }
}
