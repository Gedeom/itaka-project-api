<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PessoaEstadoCivil
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int $estado_civil_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\EstadoCivil $estado_civil
 * @property-read \App\Models\Pessoa $pessoa
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEstadoCivil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEstadoCivil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEstadoCivil query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEstadoCivil whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEstadoCivil whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEstadoCivil whereEstadoCivilId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEstadoCivil whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEstadoCivil wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEstadoCivil whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\PessoaEstadoCivilFactory factory(...$parameters)
 */
class PessoaEstadoCivil extends Model
{
    use HasFactory;

    protected $table = 'pessoa_estado_civil';
    protected $dates = ['data'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class,'pessoa_id');
    }

    public function estado_civil(){
        return $this->belongsTo(EstadoCivil::class,'estado_civil_id');
    }
}
