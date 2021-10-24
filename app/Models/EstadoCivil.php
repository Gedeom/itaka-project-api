<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EstadoCivil
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil query()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EstadoCivil extends Model
{
    use HasFactory;

    protected $table = 'estado_civil';
}
