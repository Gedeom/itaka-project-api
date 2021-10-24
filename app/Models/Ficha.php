<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Ficha
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $numero
 * @property int $situacao_id
 * @property int $canditado_id
 * @property int $responsavel_id
 * @property int $resp_parentesco_id
 * @property int $processo_is_deferido
 * @property string|null $parecer_assistente_social
 * @property string|null $outros_gastos
 * @property string|null $situacao_socieconomica_familiar
 * @property string|null $obs_nescessarias
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pessoa $candidato
 * @property-read \App\Models\Parentesco $resp_parentesco
 * @property-read \App\Models\Pessoa $responsavel
 * @property-read \App\Models\FichaSituacao $situacao
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereCanditadoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereNumero($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereObsNescessarias($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereOutrosGastos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereParecerAssistenteSocial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereProcessoIsDeferido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereRespParentescoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereResponsavelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereSituacaoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereSituacaoSocieconomicaFamiliar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ficha whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ficha extends Model
{
    use HasFactory;

    protected $table = 'ficha';
    protected $dates = ['data'];

    public function situacao(){
        return $this->belongsTo(FichaSituacao::class,'situacao_id');
    }

    public function candidato(){
        return $this->belongsTo(Pessoa::class,'pessoa_id');
    }

    public function responsavel(){
        return $this->belongsTo(Pessoa::class,'responsavel_id');
    }

    public function resp_parentesco(){
        return $this->belongsTo(Parentesco::class,'resp_parentesco_id');
    }
}
