<?php

namespace Database\Factories;

use App\Models\Escola;
use App\Models\Logradouro;
use Illuminate\Database\Eloquent\Factories\Factory;

class EscolaFactory extends Factory
{

    protected $model = Escola::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'escola' => ($this->faker->randomElement(['ESCOLA ','UNIVERSIDADE ','FACULDADE ']))  . $this->faker->name,
            'logradouro_id' => $this->faker->numberBetween(Logradouro::min('id'),Logradouro::max('id')),
            'numero_lograd' => $this->faker->numberBetween(1,1000),
            'complemento_lograd' => $this->faker->randomElement([null,'CASA','APARTAMENTO','PRÉDIO'])
        ];
    }
}
