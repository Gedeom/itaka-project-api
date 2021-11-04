<?php

namespace Database\Factories;

use App\Models\Parentesco;
use App\Models\Pessoa;
use App\Models\PessoaGrupoFamiliar;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaGrupoFamiliarFactory extends Factory
{

    protected $model = PessoaGrupoFamiliar::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $parente = Pessoa::factory()->create();
        $parentesco_id = Parentesco::select('id')->whereRaw('(id % 2 = 0) and id <> 12')->orderByRaw('RAND()')->first()->id;

        if($parente->sexo_id == 1){
            $parentesco_id = Parentesco::select('id')->whereRaw('(id % 2 <> 0) or id = 12')->orderByRaw('RAND()')->first()->id;
        }

        return [
            'data' => $this->faker->date,
            'pessoa_id' => $this->faker->numberBetween(Pessoa::min('id'),Pessoa::max('id')),
            'parente_id' => $parente->id,
            'parentesco_id' => $parentesco_id
        ];
    }
}
