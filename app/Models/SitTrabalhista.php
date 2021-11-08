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
 * App\Models\SitTrabalhista
 *
 * @property int $id
 * @property string $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|SitTrabalhista newModelQuery()
 * @method static Builder|SitTrabalhista newQuery()
 * @method static Builder|SitTrabalhista query()
 * @method static Builder|SitTrabalhista whereCreatedAt($value)
 * @method static Builder|SitTrabalhista whereDescricao($value)
 * @method static Builder|SitTrabalhista whereId($value)
 * @method static Builder|SitTrabalhista whereUpdatedAt($value)
 * @mixin Eloquent
 */
class SitTrabalhista extends Model
{
    use HasFactory;

    protected $table = 'sit_trabalhista';

    public function index()
    {
        return self::selectRaw('id, descricao')
            ->get();
    }

    public function show($id)
    {
        $sit_trabalhista = self::selectRaw('id, descricao')
            ->where('id', '=', $id)
            ->first();


        if (!$sit_trabalhista) {
            throw new Exception('Nada Encontrado', -404);
        }

        return $sit_trabalhista;
    }

    public function remove($id)
    {
        throw new Exception('Não suportado', -403);

    }

    public function search($data)
    {
        $sit_trabalhista = self::selectRaw('id, descricao');

        $sit_trabalhista = (SearchUtils::createQuery($data, $sit_trabalhista))->get();

        return $sit_trabalhista;
    }

    public function createOrUpdate($fields, $id = null)
    {
        throw new Exception('Não suportado', -403);
    }
}
