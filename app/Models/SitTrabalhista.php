<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SitTrabalhista
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista query()
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SitTrabalhista extends Model
{
    use HasFactory;

    protected $table = 'sit_trabalhista';
}
