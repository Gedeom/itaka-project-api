<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FichaSituacao
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao query()
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FichaSituacao extends Model
{
    use HasFactory;

    protected $table = 'ficha_situacao';
}
