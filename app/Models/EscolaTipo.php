<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EscolaTipo
 *
 * @property int $id
 * @property string $descricao
 * @method static \Illuminate\Database\Eloquent\Builder|EscolaTipo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EscolaTipo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EscolaTipo query()
 * @method static \Illuminate\Database\Eloquent\Builder|EscolaTipo whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EscolaTipo whereId($value)
 * @mixin \Eloquent
 */
class EscolaTipo extends Model
{
    use HasFactory;

    protected $table = 'escola_tipo';

}
