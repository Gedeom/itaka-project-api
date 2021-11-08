<?php

namespace App\Models;

use App\Models\Utils\SearchUtils;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\EstadoCivil
 *
 * @property int $id
 * @property string $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|EstadoCivil newModelQuery()
 * @method static Builder|EstadoCivil newQuery()
 * @method static Builder|EstadoCivil query()
 * @method static Builder|EstadoCivil whereCreatedAt($value)
 * @method static Builder|EstadoCivil whereDescricao($value)
 * @method static Builder|EstadoCivil whereId($value)
 * @method static Builder|EstadoCivil whereUpdatedAt($value)
 * @mixin Eloquent
 */
class EstadoCivil extends Model
{
    use HasFactory;

    protected $table = 'estado_civil';

    public function index()
    {
        return self::selectRaw('id, descricao')
            ->get();
    }

    public function show($id)
    {
        $estado_civil = self::selectRaw('id, descricao')
            ->where('id', '=', $id)
            ->first();


        if (!$estado_civil) {
            throw new Exception('Nada Encontrado', -404);
        }

        return $estado_civil;
    }

    public function remove($id)
    {
        throw new Exception('Não suportado', -403);

    }

    public function search($data)
    {
        $estado_civil = self::selectRaw('id, descricao');

        $estado_civil = (SearchUtils::createQuery($data, $estado_civil))->get();

        return $estado_civil;
    }

    public function createOrUpdate($fields, $id = null)
    {
        throw new Exception('Não suportado', -403);
    }
}
