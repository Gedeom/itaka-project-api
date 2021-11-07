<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use stdClass;

/**
 * App\Models\CondicaoMoradia
 *
 * @property int $id
 * @property string $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|CondicaoMoradia newModelQuery()
 * @method static Builder|CondicaoMoradia newQuery()
 * @method static Builder|CondicaoMoradia query()
 * @method static Builder|CondicaoMoradia whereCreatedAt($value)
 * @method static Builder|CondicaoMoradia whereDescricao($value)
 * @method static Builder|CondicaoMoradia whereId($value)
 * @method static Builder|CondicaoMoradia whereUpdatedAt($value)
 * @mixin Eloquent
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

    public static function getOptionDescricao($condicao_id, $resp): stdClass
    {
        $obj = new stdClass();
        $obj->force = 0;
        $obj->type = 'string';

        switch ($condicao_id) {
            case '3':
            {
                if ($resp == 'Outros') {
                    $obj->force = 1;
                    $obj->type = 'string';
                }
                break;
            }
            case '6':
            {
                if ($resp == 'Alugado') {
                    $obj->force = 1;
                    $obj->type = 'float';
                }

                if ($resp == 'Cedido') {
                    $obj->force = 1;
                    $obj->type = 'string';
                }

                if ($resp == 'Financiado') {
                    $obj->force = 1;
                    $obj->type = 'float';
                }
                break;
            }
            case '7':
            {
                $obj->force = 1;
                $obj->type = 'int';
                break;
            }
        }

        return $obj;
    }
}
