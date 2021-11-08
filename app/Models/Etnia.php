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
 * App\Models\Etnia
 *
 * @property int $id
 * @property string $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Etnia newModelQuery()
 * @method static Builder|Etnia newQuery()
 * @method static Builder|Etnia query()
 * @method static Builder|Etnia whereCreatedAt($value)
 * @method static Builder|Etnia whereDescricao($value)
 * @method static Builder|Etnia whereId($value)
 * @method static Builder|Etnia whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Etnia extends Model
{
    use HasFactory;

    protected $table = 'etnia';

    public function index()
    {
        return self::selectRaw('id, descricao')
            ->get();
    }

    public function show($id)
    {
        $etnia = self::selectRaw('id, descricao')
            ->where('id', '=', $id)
            ->first();


        if (!$etnia) {
            throw new Exception('Nada Encontrado', -404);
        }

        return $etnia;
    }

    public function remove($id)
    {
        throw new Exception('Não suportado', -403);

    }

    public function search($data)
    {
        $etnia = self::selectRaw('id, descricao');

        $etnia = (SearchUtils::createQuery($data, $etnia))->get();

        return $etnia;
    }

    public function createOrUpdate($fields, $id = null)
    {
        throw new Exception('Não suportado', -403);
    }
}
