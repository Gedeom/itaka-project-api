<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Cidade
 *
 * @property int $id
 * @property string $nome
 * @property int $estado_id
 * @property int $ibge
 * @property string $ddd
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Bairro[] $bairros
 * @property-read int|null $bairros_count
 * @property-read Estado $estado
 * @method static Builder|Cidade newModelQuery()
 * @method static Builder|Cidade newQuery()
 * @method static Builder|Cidade query()
 * @method static Builder|Cidade whereCreatedAt($value)
 * @method static Builder|Cidade whereDdd($value)
 * @method static Builder|Cidade whereEstadoId($value)
 * @method static Builder|Cidade whereIbge($value)
 * @method static Builder|Cidade whereId($value)
 * @method static Builder|Cidade whereNome($value)
 * @method static Builder|Cidade whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidade';

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }

    public function bairros()
    {
        return $this->hasMany(Bairro::class, 'cidade_id');
    }

    public static function getOrCreate($cidade, $estado)
    {
        $cidade_obj = self::join('estado', 'estado.id', '=', 'estado_id')
            ->where('cidade.nome', '=', $cidade)
            ->where('estado.nome', '=', $estado)
            ->selectRaw('cidade.*')
            ->first();

        if (!$cidade_obj) {
            $estado = Estado::get($estado);

            $cidade_obj = new Cidade();
            $cidade_obj->nome = $cidade;
            $cidade_obj->estado_id = $estado->id;
            $cidade_obj->save();
        }

        return $cidade_obj;
    }
}
