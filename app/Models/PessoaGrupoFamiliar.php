<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PessoaGrupoFamiliar
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int $parente_id
 * @property int $parentesco_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pessoa $parente
 * @property-read \App\Models\Parentesco $parentesco
 * @property-read \App\Models\Pessoa $pessoa
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaGrupoFamiliar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaGrupoFamiliar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaGrupoFamiliar query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaGrupoFamiliar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaGrupoFamiliar whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaGrupoFamiliar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaGrupoFamiliar whereParenteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaGrupoFamiliar whereParentescoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaGrupoFamiliar wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaGrupoFamiliar whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\PessoaGrupoFamiliarFactory factory(...$parameters)
 */
class PessoaGrupoFamiliar extends Model
{
    use HasFactory;

    protected $table = 'pessoa_grupo_familiar';
    protected $dates = ['data'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class,'pessoa_id');
    }

    public function parente(){
        return $this->belongsTo(Pessoa::class,'parente_id');
    }

    public function parentesco(){
        return $this->belongsTo(Parentesco::class,'parentesco_id');
    }
}
