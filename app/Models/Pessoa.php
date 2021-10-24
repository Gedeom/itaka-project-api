<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pessoa
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property string $nome
 * @property int $sexo_id
 * @property \Illuminate\Support\Carbon $dt_nascimento
 * @property string $doc
 * @property string|null $rg
 * @property string|null $rg_orgao_expedidor
 * @property int $naturalidade_id
 * @property int $etnia_id
 * @property string|null $email
 * @property string|null $tel_residencia
 * @property string|null $tel_recado
 * @property string|null $tel_celular
 * @property string|null $tel_emerg1
 * @property string|null $tel_emerg2
 * @property string $nome_contato_emerg
 * @property string|null $alergia
 * @property string|null $sit_medica_especial
 * @property string|null $medicacao_controlada
 * @property string|null $fratura_cirurgia
 * @property string|null $recomendacao_emergencia_med
 * @property string $renda
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Etnia $etnia
 * @property-read \App\Models\Cidade $naturalidade
 * @property-read \App\Models\Sexo $sexo
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereAlergia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereDoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereDtNascimento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereEtniaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereFraturaCirurgia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereMedicacaoControlada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereNaturalidadeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereNomeContatoEmerg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereRecomendacaoEmergenciaMed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereRenda($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereRg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereRgOrgaoExpedidor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereSexoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereSitMedicaEspecial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereTelCelular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereTelEmerg1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereTelEmerg2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereTelRecado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereTelResidencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pessoa whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoa';
    protected $dates = ['data','dt_nascimento'];

    public function sexo(){
        return $this->belongsTo(Sexo::class,'sexo_id');
    }

    public function naturalidade(){
        return $this->belongsTo(Cidade::class,'naturalidade_id');
    }

    public function etnia(){
        return $this->belongsTo(Etnia::class,'etnia_id');
    }
}
