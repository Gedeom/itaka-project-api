<?php

namespace App\Models;

use App\Models\Utils\SearchUtils;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Ficha
 *
 * @property int $id
 * @property Carbon $data
 * @property int $numero
 * @property int $situacao_id
 * @property int $candidato_id
 * @property int $responsavel_id
 * @property int $resp_parentesco_id
 * @property int $processo_is_deferido
 * @property string|null $parecer_assistente_social
 * @property string|null $outros_gastos
 * @property string|null $situacao_socieconomica_familiar
 * @property string|null $obs_nescessarias
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Pessoa $candidato
 * @property-read Parentesco $resp_parentesco
 * @property-read Pessoa $responsavel
 * @property-read FichaSituacao $situacao
 * @method static Builder|Ficha newModelQuery()
 * @method static Builder|Ficha newQuery()
 * @method static Builder|Ficha query()
 * @method static Builder|Ficha whereCanditadoId($value)
 * @method static Builder|Ficha whereCreatedAt($value)
 * @method static Builder|Ficha whereData($value)
 * @method static Builder|Ficha whereId($value)
 * @method static Builder|Ficha whereNumero($value)
 * @method static Builder|Ficha whereObsNescessarias($value)
 * @method static Builder|Ficha whereOutrosGastos($value)
 * @method static Builder|Ficha whereParecerAssistenteSocial($value)
 * @method static Builder|Ficha whereProcessoIsDeferido($value)
 * @method static Builder|Ficha whereRespParentescoId($value)
 * @method static Builder|Ficha whereResponsavelId($value)
 * @method static Builder|Ficha whereSituacaoId($value)
 * @method static Builder|Ficha whereSituacaoSocieconomicaFamiliar($value)
 * @method static Builder|Ficha whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Ficha extends Model
{
    use HasFactory;

    protected $table = 'ficha';
    protected $dates = ['data'];

    public function situacao()
    {
        return $this->belongsTo(FichaSituacao::class, 'situacao_id');
    }

    public function candidato()
    {
        return $this->belongsTo(Pessoa::class, 'pessoa_id');
    }

    public function responsavel()
    {
        return $this->belongsTo(Pessoa::class, 'responsavel_id');
    }

    public function resp_parentesco()
    {
        return $this->belongsTo(Parentesco::class, 'resp_parentesco_id');
    }

    public function index()
    {
        $fichas = self::join('pessoa as candidato', 'candidato.id', '=', 'candidato_id')
            ->join('ficha_situacao as situacao', 'situacao.id', '=', 'ficha.situacao_id')
            ->leftJoin('pessoa as resp', 'resp.id', '=', 'responsavel_id')
            ->leftJoin('parentesco', 'parentesco.id', '=', 'resp_parentesco_id')
            ->join('sexo', 'sexo.id', '=', 'candidato.sexo_id')
            ->join('cidade', 'cidade.id', '=', 'candidato.naturalidade_id')
            ->join('etnia', 'etnia.id', '=', 'candidato.etnia_id')
            ->selectRaw('ficha.id, ficha.data, situacao.descricao as situacao,
            candidato.id as candidato_id, candidato.nome as candidato, candidato.sexo_id, sexo.descricao as sexo,
            candidato.dt_nascimento, candidato.doc, candidato.rg,resp.doc as responsavel_doc, resp.nome as responsavel, resp.id as responsavel_id, parentesco.descricao as responsavel_parentesco,
            candidato.rg_orgao_expedidor, candidato.naturalidade_id,
            cidade.nome as naturalidade,candidato.etnia_id, etnia.descricao as etnia,candidato.email, candidato.tel_residencia,
            candidato.tel_recado, candidato.tel_celular,
            candidato.tel_emerg1, candidato.tel_emerg2, candidato.nome_contato_emerg, candidato.alergia,
            candidato.sit_medica_especial, candidato.medicacao_controlada, candidato.fratura_cirurgia,
            candidato.recomendacao_emergencia_med, candidato.renda')
            ->get();

        Pessoa::addTableDependencies($fichas, true);

        return $fichas;
    }

    public function show($id)
    {
        $ficha = self::join('pessoa as candidato', 'candidato.id', '=', 'candidato_id')
            ->join('ficha_situacao as situacao', 'situacao.id', '=', 'ficha.situacao_id')
            ->leftJoin('pessoa as resp', 'resp.id', '=', 'responsavel_id')
            ->leftJoin('parentesco', 'parentesco.id', '=', 'resp_parentesco_id')
            ->join('sexo', 'sexo.id', '=', 'candidato.sexo_id')
            ->join('cidade', 'cidade.id', '=', 'candidato.naturalidade_id')
            ->join('etnia', 'etnia.id', '=', 'candidato.etnia_id')
            ->selectRaw('ficha.id, ficha.data, situacao.descricao as situacao,
            candidato.id as candidato_id, candidato.nome as candidato, candidato.sexo_id, sexo.descricao as sexo,
            candidato.dt_nascimento, candidato.doc, candidato.rg,resp.doc as responsavel_doc, resp.nome as responsavel,resp.id as responsavel_id,
            parentesco.descricao as responsavel_parentesco,
            candidato.rg_orgao_expedidor, candidato.naturalidade_id,
            cidade.nome as naturalidade,candidato.etnia_id, etnia.descricao as etnia,candidato.email, candidato.tel_residencia,
            candidato.tel_recado, candidato.tel_celular,
            candidato.tel_emerg1, candidato.tel_emerg2, candidato.nome_contato_emerg, candidato.alergia,
            candidato.sit_medica_especial, candidato.medicacao_controlada, candidato.fratura_cirurgia,
            candidato.recomendacao_emergencia_med, candidato.renda')
            ->where('ficha.id', '=', $id)
            ->first();


        if (!$ficha) {
            throw new Exception('Nada Encontrado', -404);
        }

        Pessoa::addTableDependencies($ficha,true);

        return $ficha;
    }

    public function remove($id)
    {
        $ficha = Ficha::find($id);

        if (!$ficha) {
            throw new Exception('Nada Encontrado', -404);
        }

        $ficha_temp = $this->show($id);


        $ficha->delete();

        return $ficha_temp;
    }

    public function search($data)
    {
        $fichas = self::join('pessoa as candidato', 'candidato.id', '=', 'candidato_id')
            ->join('ficha_situacao as situacao', 'situacao.id', '=', 'ficha.situacao_id')
            ->leftJoin('pessoa as resp', 'resp.id', '=', 'responsavel_id')
            ->leftJoin('parentesco', 'parentesco.id', '=', 'resp_parentesco_id')
            ->join('sexo', 'sexo.id', '=', 'candidato.sexo_id')
            ->join('cidade', 'cidade.id', '=', 'candidato.naturalidade_id')
            ->join('etnia', 'etnia.id', '=', 'candidato.etnia_id')
            ->selectRaw('ficha.id, ficha.data, situacao.descricao as situacao,
            candidato.id as candidato_id, candidato.nome as candidato, sexo.id as sexo_id, sexo.descricao as sexo,
            candidato.dt_nascimento, candidato.doc, candidato.rg,resp.doc as responsavel_doc, resp.nome as responsavel,resp.id as responsavel_id, parentesco.descricao as responsavel_parentesco,
            candidato.rg_orgao_expedidor, candidato.naturalidade_id,
            cidade.nome as naturalidade,candidato.etnia_id, etnia.descricao as etnia,candidato.email, candidato.tel_residencia,
            candidato.tel_recado, candidato.tel_celular,
            candidato.tel_emerg1, candidato.tel_emerg2, candidato.nome_contato_emerg, candidato.alergia,
            candidato.sit_medica_especial, candidato.medicacao_controlada, candidato.fratura_cirurgia,
            candidato.recomendacao_emergencia_med, candidato.renda');

        $fichas = (SearchUtils::createQuery($data, $fichas))->get();
        Pessoa::addTableDependencies($fichas,true);

        return $fichas;
    }

    public function createOrUpdate($fields, $id = null)
    {
        $fields = (object)$fields;
        $data = Carbon::createFromFormat('d/m/Y', $fields->data)->startOfDay();
        $numero = $fields->numero;

        $has_numero = Ficha::where('id','<>',$id)
            ->where('numero','=',$numero)
            ->first();

        if($has_numero){
            throw new Exception('Já existe ficha com esse número!', -403);
        }


        $pessoa_init = Pessoa::where('doc','=',$fields->doc)
            ->first();

        if($id){
            $ficha = Ficha::find($id);
        }else{
            $ficha = new Ficha();
        }

        $pessoa = new Pessoa();
        $pessoa = $pessoa->createOrUpdate($fields,$pessoa_init->id ?? 0);

        $has_ficha = Ficha::where('candidato_id','=',$pessoa->id)
            ->where('id','<>',$id)
            ->where('situacao_id','<>',4)
            ->first();

        if($has_ficha){
            throw new Exception('Já existe ficha com esse candidato!', -403);
        }

        if($id && $ficha->candidato_id != $pessoa->id){
            throw new Exception('Não é possível alterar o candidato da ficha', -403);
        }

        if(!empty($fields->responsavel_id) && $fields->responsavel_id == $pessoa->id){
            throw new Exception('Responsável não pode ser igual ao candidato', -403);
        }

        $ficha->data = $data;
        $ficha->numero = $numero;
        $ficha->situacao_id = $fields->situacao_id;
        $ficha->candidato_id = $pessoa->id;
        $ficha->responsavel_id = $fields->responsavel_id ?? null;
        $ficha->resp_parentesco_id = !empty($fields->responsavel_id) ? $fields->resp_parentesco_id : null;
        $ficha->processo_is_deferido = $fields->processo_is_deferido ?? 0;
        $ficha->parecer_assistente_social = $fields->parecer_assistente_social ?? null;
        $ficha->outros_gastos = $fields->outros_gastos ?? null;
        $ficha->situacao_socieconomica_familiar = $fields->situacao_socieconomica_familiar ?? null;
        $ficha->obs_nescessarias = $fields->obs_nescessarias ?? null;
        $ficha->save();

        return $this->show($ficha->id);
    }
}
