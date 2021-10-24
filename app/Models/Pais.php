<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pais
 *
 * @property int $id
 * @property string $nome
 * @property string|null $sigla
 * @property int $bacen
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estado[] $estados
 * @property-read int|null $estados_count
 * @method static \Illuminate\Database\Eloquent\Builder|Pais newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereBacen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereSigla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pais extends Model
{
    use HasFactory;

    protected $table = 'pais';

    public function estados(){
        return $this->hasMany(Estado::class,'pais_id');
    }
}
