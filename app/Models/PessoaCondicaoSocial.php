<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PessoaCondicaoSocial
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int $condicao_social_id
 * @property string $resposta
 * @property string|null $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\CondicaoSocial $condicao_social
 * @property-read \App\Models\Pessoa $pessoa
 * @method static \Database\Factories\PessoaCondicaoSocialFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial whereCondicaoSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial whereResposta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaCondicaoSocial whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PessoaCondicaoSocial extends Model
{
    use HasFactory;

    protected $table = 'pessoa_condicao_social';
    protected $dates = ['data'];

    public function pessoa(){
        return $this->belongsTo(Pessoa::class,'pessoa_id');
    }

    public function condicao_social(){
        return $this->belongsTo(CondicaoSocial::class,'condicao_social_id');
    }
}
