<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Cidade
 *
 * @property int $id
 * @property string $nome
 * @property int $estado_id
 * @property int $ibge
 * @property string $ddd
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bairro[] $bairros
 * @property-read int|null $bairros_count
 * @property-read \App\Models\Estado $estado
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereDdd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereEstadoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereIbge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cidade whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidade';

    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id');
    }

    public function bairros(){
        return $this->hasMany(Bairro::class,'cidade_id');
    }
}
