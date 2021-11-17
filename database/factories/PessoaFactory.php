<?php

namespace Database\Factories;

use App\Models\Cidade;
use App\Models\Pessoa;
use App\Models\PessoaGrupoFamiliar;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PessoaFactory extends Factory
{

    protected $model = Pessoa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sexo_id = $this->faker->numberBetween(1,2);
        $gender = $sexo_id == 1 ? 'male' : 'female';

        return [
            'dt_criacao' => $this->faker->date(),
            'nome' => $this->faker->name($gender),
            'sexo_id' => $sexo_id,
            'dt_nascimento' => $this->faker->date,
            'doc' => random_int(10000000000,99999999999),
            'rg' => random_int(10000000,99999999),
            'rg_orgao_expedidor' => 'SSP',
            'naturalidade_id' => Cidade::select('id')->orderByRaw('RAND()')->first()->id,
            'etnia_id' => $this->faker->numberBetween(1,6),
            'email' => $this->faker->safeEmail(),
            'tel_residencia' => $this->faker->phoneNumber(),
            'tel_recado' => $this->faker->phoneNumber(),
            'tel_celular' => $this->faker->phoneNumber(),
            'tel_emerg1' => $this->faker->phoneNumber(),
            'tel_emerg2' => $this->faker->phoneNumber(),
            'nome_contato_emerg' => $this->faker->name(),
            'alergia' => $this->faker->randomElement([null,'poeira','amedoim','gatos','lactose']),
            'medicacao_controlada' => $this->faker->randomElement([null,'Diabetes','Pressão','Coração']),
            'fratura_cirurgia' => $this->faker->randomElement([null,'Perna','Braço','Joelho']),
            'recomendacao_emergencia_med' => $this->faker->randomElement([null,'Deitar','Respirar devagar','Ficar em pé']),
            'renda' => $this->faker->randomFloat(2,0,10000),
        ];
    }
}
