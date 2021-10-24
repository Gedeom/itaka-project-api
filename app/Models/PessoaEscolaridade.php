<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PessoaEscolaridade
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int|null $escola_id
 * @property string|null $serie
 * @property string|null $turma
 * @property string $escolaridade
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Escola|null $escola
 * @property-read \App\Models\Pessoa $pessoa
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereEscolaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereEscolaridade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereSerie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereTurma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PessoaEscolaridade extends Model
{
    use HasFactory;

    protected $table = 'pessoa_escolaridade';
    protected $dates = ['data'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class,'pessoa_id');
    }

    public function escola(){
        return $this->belongsTo(Escola::class,'escola_id');
    }
}
