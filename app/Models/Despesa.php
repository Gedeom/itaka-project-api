<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Despesa
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Despesa extends Model
{
    use HasFactory;

    protected $table = 'despesa';
}
