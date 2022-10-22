<?php

namespace App\Models;

use App\Models\Utils\SearchUtils;
use Eloquent;
use Exception;
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
 * @property int|null $ibge
 * @property string|null $ddd
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|\App\Models\Bairro[] $bairros
 * @property-read int|null $bairros_count
 * @property-read \App\Models\Estado $estado
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

    public function index()
    {
        return self::join('estado', 'estado.id', '=', 'estado_id')
            ->selectRaw('cidade.id, cidade.nome,estado_id,estado.nome as estado, cidade.ibge, cidade.ddd')
            ->get();
    }

    public function show($id)
    {
        $cidade = self::join('estado', 'estado.id', '=', 'estado_id')
            ->selectRaw('cidade.id, cidade.nome,estado_id,estado.nome as estado, cidade.ibge, cidade.ddd')
            ->where('cidade.id', '=', $id)
            ->first();


        if (!$cidade) {
            throw new Exception('Nada Encontrado', -404);
        }

        return $cidade;
    }

    public function remove($id)
    {
        throw new Exception('Não suportado', -403);

    }

    public function search($data)
    {
        $cidade = self::join('estado', 'estado.id', '=', 'estado_id')
            ->selectRaw('cidade.id, cidade.nome,estado_id,estado.nome as estado, cidade.ibge, cidade.ddd');

        $cidade = (SearchUtils::createQuery($data, $cidade))->get();

        return $cidade;
    }

    public function createOrUpdate($fields, $id = null)
    {
        throw new Exception('Não suportado', -403);
    }
}
