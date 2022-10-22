<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Bairro
 *
 * @property int $id
 * @property string $nome
 * @property int $cidade_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Cidade $cidade
 * @property-read Collection|\App\Models\Logradouro[] $logradouros
 * @property-read int|null $logradouros_count
 * @method static Builder|Bairro newModelQuery()
 * @method static Builder|Bairro newQuery()
 * @method static Builder|Bairro query()
 * @method static Builder|Bairro whereCidadeId($value)
 * @method static Builder|Bairro whereCreatedAt($value)
 * @method static Builder|Bairro whereId($value)
 * @method static Builder|Bairro whereNome($value)
 * @method static Builder|Bairro whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Bairro extends Model
{
    use HasFactory;

    protected $table = 'bairro';

    public function cidade()
    {
        return $this->belongsTo(Cidade::class, 'cidade_id');
    }

    public function logradouros()
    {
        return $this->hasMany(Logradouro::class, 'bairro_id');
    }

    public static function getOrCreate($bairro, $cidade, $estado)
    {
        $bairro_obj = self::join('cidade', 'cidade.id', '=', 'cidade_id')
            ->join('estado', 'estado.id', '=', 'estado_id')
            ->where('bairro.nome', '=', $bairro)
            ->where('cidade.nome', '=', $cidade)
            ->where('estado.nome', '=', $estado)
            ->selectRaw('bairro.*')
            ->first();

        if(!$bairro_obj){
            $cidade = Cidade::getOrCreate($cidade,$estado);

            $bairro_obj = new Bairro();
            $bairro_obj->nome = $bairro;
            $bairro_obj->cidade_id = $cidade->id;
            $bairro_obj->save();
        }

        return $bairro_obj;
    }
}
