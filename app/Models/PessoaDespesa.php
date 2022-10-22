<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PessoaDespesa
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int $despesa_id
 * @property string $vlr
 * @property string|null $observacoes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Despesa $despesa
 * @property-read \App\Models\Pessoa $pessoa
 * @method static \Database\Factories\PessoaDespesaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa whereDespesaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa whereObservacoes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaDespesa whereVlr($value)
 * @mixin \Eloquent
 */
class PessoaDespesa extends Model
{
    use HasFactory;

    protected $table = 'pessoa_despesa';
    protected $dates = ['data'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class,'pessoa_id');
    }

    public function despesa(){
        return $this->belongsTo(Despesa::class,'despesa_id');
    }
}
