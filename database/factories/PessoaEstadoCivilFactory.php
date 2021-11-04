<?php

namespace Database\Factories;

use App\Models\Pessoa;
use App\Models\PessoaEstadoCivil;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaEstadoCivilFactory extends Factory
{

    protected $model = PessoaEstadoCivil::class;

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
            'estado_civil_id' => $this->faker->numberBetween(1,6)
        ];
    }
}
