<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Escola
 *
 * @property int $id
 * @property string $escola
 * @property int $logradouro_id
 * @property string $numero_lograd
 * @property string|null $complemento_lograd
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Logradouro $logradouro
 * @method static \Illuminate\Database\Eloquent\Builder|Escola newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Escola newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Escola query()
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereComplementoLograd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereEscola($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereLogradouroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereNumeroLograd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\EscolaFactory factory(...$parameters)
 */
class Escola extends Model
{
    use HasFactory;

    protected $table = 'escola';

    public function logradouro(){
        return $this->belongsTo(Logradouro::class,'logradouro_id');
    }
}
