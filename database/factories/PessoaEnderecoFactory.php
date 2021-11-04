<?php

namespace Database\Factories;

use App\Models\Logradouro;
use App\Models\Pessoa;
use App\Models\PessoaEndereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaEnderecoFactory extends Factory
{
    protected $model = PessoaEndereco::class;

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
            'logradouro_id' => $this->faker->numberBetween(Logradouro::min('id'),Logradouro::max('id')),
            'numero_lograd' => $this->faker->numberBetween(1,1000),
            'complemento_lograd' => $this->faker->randomElement([null,'CASA','APARTAMENTO','PRÉDIO'])
        ];
    }
}
