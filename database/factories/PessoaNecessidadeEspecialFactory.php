<?php

namespace Database\Factories;

use App\Models\NecessidadeEspecial;
use App\Models\Pessoa;
use App\Models\PessoaNecessidadeEspecial;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaNecessidadeEspecialFactory extends Factory
{
    protected $model = PessoaNecessidadeEspecial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data' => $this->faker->date,
            'pessoa_id' => $this->faker->numberBetween(Pessoa::min('id'),Pessoa::max('id')),
            'necessidade_especial_id' => $this->faker->numberBetween(NecessidadeEspecial::min('id'),NecessidadeEspecial::max('id'))
        ];
    }
}
