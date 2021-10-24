<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PessoaCondicaoMoradia
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $endereco_pessoa_id
 * @property int $condicao_moradia_id
 * @property string $resposta
 * @property string|null $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CondicaoMoradia $condicao_moradia
 * @property-read \App\Models\PessoaEndereco $pessoa_endereco
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia whereCondicaoMoradiaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia whereEnderecoPessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia whereResposta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoMoradia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PessoaCondicaoMoradia extends Model
{
    use HasFactory;

    protected $table = 'pessoa_condicao_moradia';
    protected $dates = ['data'];

    public function pessoa_endereco(){
        return $this->belongsTo(PessoaEndereco::class,'endereco_pessoa_id');
    }

    public function condicao_moradia(){
        return $this->belongsTo(CondicaoMoradia::class,'condicao_moradia_id');
    }
}
