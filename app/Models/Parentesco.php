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
 * App\Models\Parentesco
 *
 * @property int $id
 * @property string $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Parentesco newModelQuery()
 * @method static Builder|Parentesco newQuery()
 * @method static Builder|Parentesco query()
 * @method static Builder|Parentesco whereCreatedAt($value)
 * @method static Builder|Parentesco whereDescricao($value)
 * @method static Builder|Parentesco whereId($value)
 * @method static Builder|Parentesco whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Parentesco extends Model
{
    use HasFactory;

    protected $table = 'parentesco';

    public function index()
    {
        return self::selectRaw('id, descricao')
            ->get();
    }

    public function show($id)
    {
        $parentesco = self::selectRaw('id, descricao')
            ->where('id', '=', $id)
            ->first();


        if (!$parentesco) {
            throw new Exception('Nada Encontrado', -404);
        }

        return $parentesco;
    }

    public function remove($id)
    {
        throw new Exception('Não suportado', -403);

    }

    public function search($data)
    {
        $parentesco = self::selectRaw('id, descricao');

        $parentesco = (SearchUtils::createQuery($data, $parentesco))->get();

        return $parentesco;
    }

    public function createOrUpdate($fields, $id = null)
    {
        throw new Exception('Não suportado', -403);
    }
}
