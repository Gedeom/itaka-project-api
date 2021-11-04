<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CondicaoMoradia
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia query()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CondicaoMoradia extends Model
{
    use HasFactory;

    protected $table = 'condicao_moradia';

    public static $resposta = [
        1 => [
            'Sim' => 'Sim',
            'Não' => 'Não'
        ],
        2 => [
            'Sim' => 'Sim',
            'Não' => 'Não'
        ],
        3 => [
            'Laje' => 'Laje',
            'Telha colonial' => 'Telha colonial',
            'Telha amianto/zinco' => 'Telha amianto/zinco',
            'Lona' => 'Lona',
            'Outros' => 'Outros'
        ],
        4 => [
            'Sim' => 'Sim',
            'Não' => 'Não'
        ],
        5 => [
            'Sim' => 'Sim',
            'Não' => 'Não',
            'Coletiva' => 'Coletiva',
        ],
        6 => [
            'Próprio' => 'Próprio',
            'Alugado' => 'Alugado',
            'Cedido' => 'Cedido',
            'Financiado' => 'Financiado',
        ],
        7 => [
            'NÚMERO DE CÔMODOS DA MORADIA' => 'NÚMERO DE CÔMODOS DA MORADIA',
        ],
    ];
}
