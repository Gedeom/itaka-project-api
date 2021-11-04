<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\NecessidadeEspecial
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial query()
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\NecessidadeEspecialFactory factory(...$parameters)
 */
class NecessidadeEspecial extends Model
{
    use HasFactory;

    protected $table = 'necessidade_especial';
}
