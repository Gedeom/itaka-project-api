<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PessoaEndereco
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int $logradouro_id
 * @property string $numero_lograd
 * @property string|null $complemento_lograd
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Logradouro $logradouro
 * @property-read \App\Models\Pessoa $pessoa
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereComplementoLograd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereLogradouroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereNumeroLograd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PessoaEndereco extends Model
{
    use HasFactory;

    protected $table = 'pessoa_endereco';
    protected $dates = ['data'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class,'pessoa_id');
    }

    public function logradouro(){
        return $this->belongsTo(Logradouro::class,'logradouro_id');
    }
}
