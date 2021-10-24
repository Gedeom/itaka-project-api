<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bairro
 *
 * @property int $id
 * @property string $nome
 * @property int $cidade_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Cidade $cidade
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Logradouro[] $logradouros
 * @property-read int|null $logradouros_count
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereCidadeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bairro whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Bairro extends Model
{
    use HasFactory;

    protected $table = 'bairro';

    public function cidade(){
        return $this->belongsTo(Cidade::class,'cidade_id');
    }

    public function logradouros(){
        return $this->hasMany(Logradouro::class,'bairro_id');
    }
}
