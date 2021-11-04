<?php

namespace Database\Factories;

use App\Models\CondicaoMoradia;
use App\Models\Pessoa;
use App\Models\PessoaCondicaoMoradia;
use App\Models\PessoaEndereco;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaCondicaoMoradiaFactory extends Factory
{

    protected $model = PessoaCondicaoMoradia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $condicao_moradia_id = $this->faker->numberBetween(1, 7);
        $resp = $this->faker->randomElement(CondicaoMoradia::$resposta[$condicao_moradia_id]);

        switch ($resp) {
            case 'Outros':
            {
                $descricao = 'Telha ferro';
                break;
            }
            case 'Alugado':
            case 'Financiado':

            {
                $descricao = $this->faker->randomFloat(2, 300, 1000);
                break;
            }
            case 'Cedido':
            {
                $descricao = $this->faker->name;
                break;
            }
            case 'NÚMERO DE CÔMODOS DA MORADIA':
            {
                $descricao = $this->faker->numberBetween(1, 10);
                break;
            }
            default:
            {
                $descricao = null;
                break;
            }
        }

        return [
            'data' => $this->faker->date,
            'endereco_pessoa_id' => $this->faker->numberBetween(PessoaEndereco::min('id'), PessoaEndereco::max('id')),
            'condicao_moradia_id' => $condicao_moradia_id,
            'resposta' => $resp,
            'descricao' => $descricao
        ];
    }
}
