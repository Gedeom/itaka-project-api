<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Estado
 *
 * @property int $id
 * @property string $nome
 * @property string $uf
 * @property int $ibge
 * @property int|null $pais_id
 * @property string|null $ddd
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cidade[] $cidades
 * @property-read int|null $cidades_count
 * @property-read \App\Models\Pais|null $pais
 * @method static \Illuminate\Database\Eloquent\Builder|Estado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estado query()
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereDdd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereIbge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado wherePaisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereUf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Estado extends Model
{
    use HasFactory;

    protected $table = 'estado';

    public function pais(){
        return $this->belongsTo(Pais::class,'pais_id');
    }

    public function cidades(){
        return $this->hasMany(Cidade::class,'estado_id');
    }
}
