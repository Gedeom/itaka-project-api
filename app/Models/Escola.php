<?php

namespace App\Models;

use App\Models\Utils\SearchUtils;
use Database\Factories\EscolaFactory;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Escola
 *
 * @property int $id
 * @property string $escola
 * @property int $logradouro_id
 * @property string $numero_lograd
 * @property string|null $complemento_lograd
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Logradouro $logradouro
 * @method static Builder|Escola newModelQuery()
 * @method static Builder|Escola newQuery()
 * @method static Builder|Escola query()
 * @method static Builder|Escola whereComplementoLograd($value)
 * @method static Builder|Escola whereCreatedAt($value)
 * @method static Builder|Escola whereEscola($value)
 * @method static Builder|Escola whereId($value)
 * @method static Builder|Escola whereLogradouroId($value)
 * @method static Builder|Escola whereNumeroLograd($value)
 * @method static Builder|Escola whereUpdatedAt($value)
 * @mixin Eloquent
 * @method static EscolaFactory factory(...$parameters)
 */
class Escola extends Model
{
    use HasFactory;

    protected $table = 'escola';

    public function logradouro()
    {
        return $this->belongsTo(Logradouro::class, 'logradouro_id');
    }

    public function index()
    {
        return self::join('logradouro as lograd', 'lograd.id', '=', 'logradouro_id')
            ->join('bairro', 'bairro.id', '=', 'bairro_id')
            ->join('cidade', 'cidade.id', '=', 'cidade_id')
            ->join('estado', 'estado.id', '=', 'estado_id')
            ->selectRaw('escola.id, escola.escola, escola.numero_lograd,escola.complemento_lograd,lograd.nome as logradouro,
            lograd.id as logradouro_id, lograd.cep,bairro_id,bairro.nome as bairro, cidade_id,cidade.nome as cidade, estado_id,estado.nome as estado')
            ->orderByRaw('escola.escola')
            ->get();
    }

    public function createOrUpdate($fields, $id = null)
    {
        $fields = (object)$fields;

        if ($id) {
            $escola = Escola::find($id);
        } else {
            $escola = new Escola();
        }

        $escola->escola = $fields->escola;
        $escola->logradouro_id = $fields->logradouro_id;
        $escola->numero_lograd = $fields->numero_lograd;
        $escola->complemento_lograd = $fields->complemento_lograd ?? null;
        $escola->save();

        return $this->show($escola->id);
    }

    public function show($id)
    {
        $show = self::join('logradouro as lograd', 'lograd.id', '=', 'logradouro_id')
            ->join('bairro', 'bairro.id', '=', 'bairro_id')
            ->join('cidade', 'cidade.id', '=', 'cidade_id')
            ->join('estado', 'estado.id', '=', 'estado_id')
            ->selectRaw('escola.id, escola.escola, escola.numero_lograd,escola.complemento_lograd,lograd.nome as logradouro,
            lograd.id as logradouro_id, lograd.cep, bairro_id,bairro.nome as bairro, cidade_id,cidade.nome as cidade, estado_id,estado.nome as estado')
            ->where('escola.id', '=', $id)
            ->orderByRaw('escola.escola')
            ->first();

        if (!$show) {
            throw new Exception('Nada Encontrado', -404);
        }

        return $show;
    }

    public function remove($id)
    {
        $escola = Escola::find($id);

        if (!$escola) {
            throw new Exception('Nada Encontrado', -404);
        }

        $escola_tmp = $this->show($escola->id);

        $escola->delete();
        return $escola_tmp;
    }

    public function search($data)
    {
        $escolas = self::join('logradouro as lograd', 'lograd.id', '=', 'logradouro_id')
            ->join('bairro', 'bairro.id', '=', 'bairro_id')
            ->join('cidade', 'cidade.id', '=', 'cidade_id')
            ->join('estado', 'estado.id', '=', 'estado_id')
            ->selectRaw('escola.id, escola.escola, escola.numero_lograd,escola.complemento_lograd,lograd.nome as logradouro,
            lograd.id as logradouro_id, lograd.cep, bairro_id,bairro.nome as bairro, cidade_id,cidade.nome as cidade, estado_id,estado.nome as estado')
            ->orderByRaw('escola');

        $escolas = SearchUtils::createQuery($data, $escolas);

        return $escolas->get();
    }
}
