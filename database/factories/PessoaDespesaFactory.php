<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\PessoaDespesa;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaDespesaFactory extends Factory
{

    protected $model = PessoaDespesa::class;

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
            'despesa_id' => $this->faker->numberBetween(1,10),
            'vlr' => $this->faker->randomFloat(2,10,3000),
            'observacoes' => null
        ];
    }
}
