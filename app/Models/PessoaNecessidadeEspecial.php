<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PessoaNecessidadeEspecial
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int $necessidade_especial_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\NecessidadeEspecial $necessidade_especial
 * @property-read \App\Models\Pessoa $pessoa
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial whereNecessidadeEspecialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\PessoaNecessidadeEspecialFactory factory(...$parameters)
 */
class PessoaNecessidadeEspecial extends Model
{
    use HasFactory;

    protected $table = 'pessoa_necessidade_especial';
    protected $dates = ['data'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class,'pessoa_id');
    }

    public function necessidade_especial(){
        return $this->belongsTo(NecessidadeEspecial::class,'necessidade_especial_id');
    }
}
