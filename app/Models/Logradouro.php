<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Logradouro
 *
 * @property int $id
 * @property string $nome
 * @property string $cep
 * @property int $bairro_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Bairro $bairro
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Escola[] $escolas
 * @property-read int|null $escolas_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PessoaEndereco[] $pessoa_enderecos
 * @property-read int|null $pessoa_enderecos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro query()
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereBairroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereCep($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Logradouro whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Logradouro extends Model
{
    use HasFactory;

    protected $table = 'logradouro';

    public function bairro(){
        return $this->belongsTo(Bairro::class,'bairro_id');
    }

    public function escolas(){
        return $this->hasMany(Escola::class,'logradouro_id');
    }

    public function pessoa_enderecos(){
        return $this->hasMany(PessoaEndereco::class,'logradouro_id');
    }
}
