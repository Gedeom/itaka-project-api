<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use stdClass;

/**
 * App\Models\CondicaoSocial
 *
 * @property int $id
 * @property string $descricao
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|CondicaoSocial newModelQuery()
 * @method static Builder|CondicaoSocial newQuery()
 * @method static Builder|CondicaoSocial query()
 * @method static Builder|CondicaoSocial whereCreatedAt($value)
 * @method static Builder|CondicaoSocial whereDescricao($value)
 * @method static Builder|CondicaoSocial whereId($value)
 * @method static Builder|CondicaoSocial whereUpdatedAt($value)
 * @mixin Eloquent
 */
class CondicaoSocial extends Model
{
    use HasFactory;

    protected $table = 'condicao_social';
}
