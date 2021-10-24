<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sexo
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sexo extends Model
{
    use HasFactory;

    protected $table = 'sexo';
}
