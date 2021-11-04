<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\PessoaSitTrabalhista;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaSitTrabalhistaFactory extends Factory
{

    protected $model = PessoaSitTrabalhista::class;

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
            'sit_trabalhista_id' => $this->faker->numberBetween(1,4)
        ];
    }
}
