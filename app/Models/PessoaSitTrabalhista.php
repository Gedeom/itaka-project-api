<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PessoaSitTrabalhista
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int $sit_trabalhista_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pessoa $pessoa
 * @property-read \App\Models\SitTrabalhista $situacao_trabalhista
 * @method static \Database\Factories\PessoaSitTrabalhistaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaSitTrabalhista newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaSitTrabalhista newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaSitTrabalhista query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaSitTrabalhista whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaSitTrabalhista whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaSitTrabalhista whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaSitTrabalhista wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaSitTrabalhista whereSitTrabalhistaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaSitTrabalhista whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PessoaSitTrabalhista extends Model
{
    use HasFactory;

    protected $table = 'pessoa_sit_trabalhista';
    protected $dates = ['data'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class,'pessoa_id');
    }

    public function situacao_trabalhista(){
        return $this->belongsTo(SitTrabalhista::class,'sit_trabalhista_id');
    }
}
