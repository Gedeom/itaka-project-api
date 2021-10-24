<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CondicaoSocial
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial query()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CondicaoSocial extends Model
{
    use HasFactory;

    protected $table = 'condicao_social';
}
