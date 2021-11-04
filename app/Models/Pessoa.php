<?php

namespace App\Models;

use App\Models\Utils\SearchUtils;
use Database\Factories\PessoaFactory;
use DB;
use Eloquent;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Pessoa
 *
 * @property int $id
 * @property Carbon $data
 * @property string $nome
 * @property int $sexo_id
 * @property Carbon $dt_nascimento
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Etnia $etnia
 * @property-read Cidade $naturalidade
 * @property-read Collection|PessoaCondicaoMoradia[] $relation_condicao_moradia
 * @property-read int|null $relation_condicao_moradia_count
 * @property-read Collection|PessoaCondicaoSocial[] $relation_condicao_social
 * @property-read int|null $relation_condicao_social_count
 * @property-read Collection|PessoaDespesa[] $relation_despesa
 * @property-read int|null $relation_despesa_count
 * @property-read Collection|PessoaEndereco[] $relation_endereco
 * @property-read int|null $relation_endereco_count
 * @property-read Collection|PessoaEscolaridade[] $relation_escolaridade
 * @property-read int|null $relation_escolaridade_count
 * @property-read Collection|PessoaEstadoCivil[] $relation_estado_civil
 * @property-read int|null $relation_estado_civil_count
 * @property-read Collection|PessoaGrupoFamiliar[] $relation_grupo_familiar
 * @property-read int|null $relation_grupo_familiar_count
 * @property-read Collection|PessoaNecessidadeEspecial[] $relation_necessidade_especial
 * @property-read int|null $relation_necessidade_especial_count
 * @property-read Collection|PessoaSitTrabalhista[] $relation_situacao_trabalhista
 * @property-read int|null $relation_situacao_trabalhista_count
 * @property-read Sexo $sexo
 * @method static PessoaFactory factory(...$parameters)
 * @method static Builder|Pessoa newModelQuery()
 * @method static Builder|Pessoa newQuery()
 * @method static Builder|Pessoa query()
 * @method static Builder|Pessoa whereAlergia($value)
 * @method static Builder|Pessoa whereCreatedAt($value)
 * @method static Builder|Pessoa whereData($value)
 * @method static Builder|Pessoa whereDoc($value)
 * @method static Builder|Pessoa whereDtNascimento($value)
 * @method static Builder|Pessoa whereEmail($value)
 * @method static Builder|Pessoa whereEtniaId($value)
 * @method static Builder|Pessoa whereFraturaCirurgia($value)
 * @method static Builder|Pessoa whereId($value)
 * @method static Builder|Pessoa whereMedicacaoControlada($value)
 * @method static Builder|Pessoa whereNaturalidadeId($value)
 * @method static Builder|Pessoa whereNome($value)
 * @method static Builder|Pessoa whereNomeContatoEmerg($value)
 * @method static Builder|Pessoa whereRecomendacaoEmergenciaMed($value)
 * @method static Builder|Pessoa whereRenda($value)
 * @method static Builder|Pessoa whereRg($value)
 * @method static Builder|Pessoa whereRgOrgaoExpedidor($value)
 * @method static Builder|Pessoa whereSexoId($value)
 * @method static Builder|Pessoa whereSitMedicaEspecial($value)
 * @method static Builder|Pessoa whereTelCelular($value)
 * @method static Builder|Pessoa whereTelEmerg1($value)
 * @method static Builder|Pessoa whereTelEmerg2($value)
 * @method static Builder|Pessoa whereTelRecado($value)
 * @method static Builder|Pessoa whereTelResidencia($value)
 * @method static Builder|Pessoa whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoa';
    protected $dates = ['data', 'dt_nascimento'];

    public function sexo()
    {
        return $this->belongsTo(Sexo::class, 'sexo_id');
    }

    public function naturalidade()
    {
        return $this->belongsTo(Cidade::class, 'naturalidade_id');
    }

    public function etnia()
    {
        return $this->belongsTo(Etnia::class, 'etnia_id');
    }

    public function relation_grupo_familiar()
    {
        return $this->hasMany(PessoaGrupoFamiliar::class, 'pessoa_id');
    }

    public function relation_endereco()
    {
        return $this->hasMany(PessoaEndereco::class, 'pessoa_id');
    }

    public function relation_condicao_moradia()
    {
        return $this->hasMany(PessoaCondicaoMoradia::class, 'pessoa_id');
    }

    public function relation_condicao_social()
    {
        return $this->hasMany(PessoaCondicaoSocial::class, 'pessoa_id');
    }

    public function relation_despesa()
    {
        return $this->hasMany(PessoaDespesa::class, 'pessoa_id');
    }

    public function relation_escolaridade()
    {
        return $this->hasMany(PessoaEscolaridade::class, 'pessoa_id');
    }

    public function relation_estado_civil()
    {
        return $this->hasMany(PessoaEstadoCivil::class, 'pessoa_id');
    }

    public function relation_necessidade_especial()
    {
        return $this->hasMany(PessoaNecessidadeEspecial::class, 'pessoa_id');
    }

    public function relation_situacao_trabalhista()
    {
        return $this->hasMany(PessoaSitTrabalhista::class, 'pessoa_id');
    }

    public function index()
    {
        $pessoas = DB::table('pessoa')
            ->join('sexo', 'sexo.id', '=', 'sexo_id')
            ->join('cidade', 'cidade.id', '=', 'naturalidade_id')
            ->join('etnia', 'etnia.id', '=', 'etnia_id')
            ->selectRaw('pessoa.id, data, pessoa.nome, sexo_id, sexo.descricao as sexo, dt_nascimento, doc, rg, rg_orgao_expedidor, naturalidade_id,
            cidade.nome as naturalidade,etnia_id, etnia.descricao as etnia,email, tel_residencia, tel_recado, tel_celular,
            tel_emerg1, tel_emerg2, nome_contato_emerg, alergia, sit_medica_especial, medicacao_controlada, fratura_cirurgia,
            recomendacao_emergencia_med, renda')
            ->get();

        $this->addTableDependencies($pessoas);

        return $pessoas;
    }

    public function show($id)
    {
        $pessoa = DB::table('pessoa')
            ->join('sexo', 'sexo.id', '=', 'sexo_id')
            ->join('cidade', 'cidade.id', '=', 'naturalidade_id')
            ->join('etnia', 'etnia.id', '=', 'etnia_id')
            ->selectRaw('pessoa.id, data, pessoa.nome, sexo_id, sexo.descricao as sexo, dt_nascimento, doc, rg, rg_orgao_expedidor, naturalidade_id,
            cidade.nome as naturalidade,etnia_id, etnia.descricao as etnia,email, tel_residencia, tel_recado, tel_celular,
            tel_emerg1, tel_emerg2, nome_contato_emerg, alergia, sit_medica_especial, medicacao_controlada, fratura_cirurgia,
            recomendacao_emergencia_med, renda')
            ->where('pessoa.id', '=', $id)
            ->first();


        if (!$pessoa) {
            throw new Exception('Nada Encontrado', -404);
        }

        $this->addTableDependencies($pessoa);

        return $pessoa;
    }

    public function remove($id)
    {
        $pessoa = Pessoa::find($id);

        if (!$pessoa) {
            throw new Exception('Nada Encontrado', -404);
        }

        $pessoa_temp = DB::table('pessoa')
            ->join('sexo', 'sexo.id', '=', 'sexo_id')
            ->join('cidade', 'cidade.id', '=', 'naturalidade_id')
            ->join('etnia', 'etnia.id', '=', 'etnia_id')
            ->selectRaw('pessoa.id, data, pessoa.nome, sexo_id, sexo.descricao as sexo, dt_nascimento, doc, rg, rg_orgao_expedidor, naturalidade_id,
            cidade.nome as naturalidade,etnia_id, etnia.descricao as etnia,email, tel_residencia, tel_recado, tel_celular,
            tel_emerg1, tel_emerg2, nome_contato_emerg, alergia, sit_medica_especial, medicacao_controlada, fratura_cirurgia,
            recomendacao_emergencia_med, renda')
            ->where('pessoa.id', '=', $id)
            ->first();

        $pessoa->delete();

        return $pessoa_temp;
    }

    public function search($data)
    {
        $pessoas = DB::table('pessoa')
            ->join('sexo', 'sexo.id', '=', 'sexo_id')
            ->join('cidade', 'cidade.id', '=', 'naturalidade_id')
            ->join('etnia', 'etnia.id', '=', 'etnia_id')
            ->selectRaw('pessoa.id, data, pessoa.nome, sexo_id, sexo.descricao as sexo, dt_nascimento, doc, rg, rg_orgao_expedidor, naturalidade_id,
            cidade.nome as naturalidade,etnia_id, etnia.descricao as etnia,email, tel_residencia, tel_recado, tel_celular,
            tel_emerg1, tel_emerg2, nome_contato_emerg, alergia, sit_medica_especial, medicacao_controlada, fratura_cirurgia,
            recomendacao_emergencia_med, renda');

        $pessoas = (SearchUtils::createQuery($data, $pessoas))->get();
        $this->addTableDependencies($pessoas);

        return $pessoas;
    }


    private function addTableDependencies(&$pessoas, $data = null)
    {
        $data = !$data ? 'NULL' : $data;
        $is_pessoa_obj = false;

        //verificar se é objeto
        if (isset($pessoas->id)) {
            $pessoas = [0 => $pessoas];
            $is_pessoa_obj = true;
        }

        /* @var $pessoas Pessoa[] */
        foreach ($pessoas as $p) {
            $grupo_familiar = DB::table('pessoa_grupo_familiar')
                ->where('pessoa_id', '=', $p->id)
                ->join('pessoa as parente', 'parente.id', '=', 'parente_id')
                ->join('sexo', 'sexo.id', '=', 'sexo_id')
                ->join('cidade', 'cidade.id', '=', 'naturalidade_id')
                ->join('etnia', 'etnia.id', '=', 'etnia_id')
                ->join('parentesco as par', 'par.id', '=', 'parentesco_id')
                ->selectRaw('pessoa_grupo_familiar.id, parente.id as parente_id, pessoa_grupo_familiar.data, parente.data as dt_cad_pessoa, parente.nome, parentesco_id,par.descricao as parentesco,
                sexo_id, sexo.descricao as sexo, dt_nascimento, doc, rg, rg_orgao_expedidor, naturalidade_id,
                cidade.nome as naturalidade,etnia_id, etnia.descricao as etnia,email, tel_residencia, tel_recado, tel_celular,
                tel_emerg1, tel_emerg2, nome_contato_emerg, alergia, sit_medica_especial, medicacao_controlada, fratura_cirurgia,
                recomendacao_emergencia_med, renda')
                ->orderBy('pessoa_grupo_familiar.data', 'desc')
                ->orderBy('pessoa_grupo_familiar.id')
                ->whereRaw("(select max(data) from pessoa_grupo_familiar f where pessoa_id = pessoa_grupo_familiar.pessoa_id) = coalesce($data,pessoa_grupo_familiar.data)")
                ->get();

            $endereco = DB::table('pessoa_endereco')
                ->where('pessoa_id', '=', $p->id)
                ->join('logradouro', 'logradouro.id', '=', 'logradouro_id')
                ->join('bairro', 'bairro.id', '=', 'bairro_id')
                ->join('cidade', 'cidade.id', '=', 'cidade_id')
                ->join('estado', 'estado.id', '=', 'estado_id')
                ->selectRaw('pessoa_endereco.id, pessoa_endereco.data, logradouro.id as logradouro_id, logradouro.nome as logradouro,
                logradouro.cep, numero_lograd, complemento_lograd, bairro_id,bairro.nome as bairro, cidade_id,cidade.nome as cidade, estado_id,estado.nome as estado')
                ->orderBy('pessoa_endereco.data', 'desc')
                ->whereRaw("pessoa_endereco.data = coalesce($data,data)")
                ->first();

            $condicao_moradia = DB::table('pessoa_condicao_moradia')
                ->join('pessoa_endereco as p_end', 'p_end.id', '=', 'endereco_pessoa_id')
                ->join('condicao_moradia', 'condicao_moradia.id', '=', 'condicao_moradia_id')
                ->where('p_end.pessoa_id', '=', $p->id)
                ->selectRaw('pessoa_condicao_moradia.id, pessoa_condicao_moradia.data, condicao_moradia_id, condicao_moradia.descricao as condicao_moradia,
                resposta, pessoa_condicao_moradia.descricao')
                ->orderBy('pessoa_condicao_moradia.data', 'desc')
                ->orderBy('pessoa_condicao_moradia.id')
                ->whereRaw("(select max(pcm.data) from pessoa_condicao_moradia pcm
                 join pessoa_endereco as pe on pe.id = pcm.endereco_pessoa_id
                 where pessoa_id = p_end.pessoa_id) = coalesce($data,pessoa_condicao_moradia.data)")
                ->get();

            $condicao_social = DB::table('pessoa_condicao_social')
                ->join('condicao_social', 'condicao_social.id', '=', 'condicao_social_id')
                ->where('pessoa_id', '=', $p->id)
                ->selectRaw('pessoa_condicao_social.id, data, condicao_social_id, condicao_social.descricao as condicao_social,
                resposta, pessoa_condicao_social.descricao')
                ->orderBy('pessoa_condicao_social.data', 'desc')
                ->orderBy('pessoa_condicao_social.id')
                ->whereRaw("(select max(data) from pessoa_condicao_social pcs where pessoa_id = pessoa_condicao_social.pessoa_id) = coalesce($data,pessoa_condicao_social.data)")
                ->get();

            $despesa = DB::table('pessoa_despesa')
                ->join('despesa', 'despesa.id', '=', 'despesa_id')
                ->where('pessoa_id', '=', $p->id)
                ->selectRaw('pessoa_despesa.id, data, despesa_id, despesa.descricao as despesa, vlr, observacoes')
                ->orderBy('pessoa_despesa.data', 'desc')
                ->orderBy('pessoa_despesa.id')
                ->whereRaw("(select max(data) from pessoa_despesa pd where pessoa_id = pessoa_despesa.pessoa_id) = coalesce($data,pessoa_despesa.data)")
                ->get();

            $escolaridade = DB::table('pessoa_escolaridade')
                ->join('escola', 'escola.id', '=', 'escola_id')
                ->join('logradouro', 'logradouro.id', '=', 'logradouro_id')
                ->join('bairro', 'bairro.id', '=', 'bairro_id')
                ->join('cidade', 'cidade.id', '=', 'cidade_id')
                ->join('estado', 'estado.id', '=', 'estado_id')
                ->where('pessoa_id', '=', $p->id)
                ->selectRaw('pessoa_escolaridade.id, data, escola.escola, serie, turma, escolaridade, logradouro.id as logradouro_id, logradouro.nome as logradouro,
                logradouro.cep, numero_lograd, complemento_lograd, bairro_id,bairro.nome as bairro, cidade_id,cidade.nome as cidade, estado_id,estado.nome as estado')
                ->orderBy('pessoa_escolaridade.data', 'desc')
                ->orderBy('pessoa_escolaridade.id')
                ->whereRaw("pessoa_escolaridade.data = coalesce($data,data)")
                ->first();

            $estado_civil = DB::table('pessoa_estado_civil')
                ->join('estado_civil', 'estado_civil.id', '=', 'estado_civil_id')
                ->where('pessoa_id', '=', $p->id)
                ->selectRaw('pessoa_estado_civil.id, data, estado_civil_id, estado_civil.descricao as estado_civil')
                ->orderBy('pessoa_estado_civil.data', 'desc')
                ->orderBy('pessoa_estado_civil.id')
                ->whereRaw("pessoa_estado_civil.data = coalesce($data,data)")
                ->first();

            $necessidade_especial = DB::table('pessoa_necessidade_especial')
                ->join('necessidade_especial as nece', 'nece.id', '=', 'necessidade_especial_id')
                ->where('pessoa_id', '=', $p->id)
                ->selectRaw('pessoa_necessidade_especial.id, data, necessidade_especial_id,nece.descricao as necessidade_especial')
                ->orderBy('pessoa_necessidade_especial.data', 'desc')
                ->orderBy('pessoa_necessidade_especial.id')
                ->whereRaw("(select max(data) from pessoa_necessidade_especial pne where pessoa_id = pessoa_necessidade_especial.pessoa_id) = coalesce($data,pessoa_necessidade_especial.data)")
                ->get();

            $situacao_trabalhista = DB::table('pessoa_sit_trabalhista')
                ->join('sit_trabalhista as sit', 'sit.id', '=', 'sit_trabalhista_id')
                ->where('pessoa_id', '=', $p->id)
                ->selectRaw('pessoa_sit_trabalhista.id, data, sit_trabalhista_id, sit.descricao as situacao_trabalhista')
                ->orderBy('pessoa_sit_trabalhista.data', 'desc')
                ->orderBy('pessoa_sit_trabalhista.id')
                ->whereRaw("pessoa_sit_trabalhista.data = coalesce($data,data)")
                ->first();

            $p->grupo_familiar = $grupo_familiar;
            $p->endereco = $endereco;
            $p->condicoes_moradia = $condicao_moradia;
            $p->condicoes_sociais = $condicao_social;
            $p->despesas = $despesa;
            $p->escolaridade = $escolaridade;
            $p->estado_civil = $estado_civil;
            $p->necessidades_especiais = $necessidade_especial;
            $p->situacao_trabalhista = $situacao_trabalhista;


        }

        if ($is_pessoa_obj)
            $pessoas = $pessoas[0];
    }
}
