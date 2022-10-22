<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Bairro
 *
 * @property int $id
 * @property string $nome
 * @property int $cidade_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Cidade $cidade
 * @property-read Collection|Logradouro[] $logradouros
 * @property-read int|null $logradouros_count
 * @method static Builder|Bairro newModelQuery()
 * @method static Builder|Bairro newQuery()
 * @method static Builder|Bairro query()
 * @method static Builder|Bairro whereCidadeId($value)
 * @method static Builder|Bairro whereCreatedAt($value)
 * @method static Builder|Bairro whereId($value)
 * @method static Builder|Bairro whereNome($value)
 * @method static Builder|Bairro whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class Bairro extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cidade
 *
 * @property int $id
 * @property string $nome
 * @property int $estado_id
 * @property int $ibge
 * @property string $ddd
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Bairro[] $bairros
 * @property-read int|null $bairros_count
 * @property-read Estado $estado
 * @method static Builder|Cidade newModelQuery()
 * @method static Builder|Cidade newQuery()
 * @method static Builder|Cidade query()
 * @method static Builder|Cidade whereCreatedAt($value)
 * @method static Builder|Cidade whereDdd($value)
 * @method static Builder|Cidade whereEstadoId($value)
 * @method static Builder|Cidade whereIbge($value)
 * @method static Builder|Cidade whereId($value)
 * @method static Builder|Cidade whereNome($value)
 * @method static Builder|Cidade whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class Cidade extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CondicaoMoradia
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia query()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoMoradia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class CondicaoMoradia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CondicaoSocial
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial query()
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CondicaoSocial whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class CondicaoSocial extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Despesa
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Despesa whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Despesa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Escola
 *
 * @property int $id
 * @property string $escola
 * @property int $logradouro_id
 * @property string $numero_lograd
 * @property string|null $complemento_lograd
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Logradouro $logradouro
 * @method static \Illuminate\Database\Eloquent\Builder|Escola newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Escola newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Escola query()
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereComplementoLograd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereEscola($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereLogradouroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereNumeroLograd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Escola whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\EscolaFactory factory(...$parameters)
 */
	class Escola extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Estado
 *
 * @property int $id
 * @property string $nome
 * @property string $uf
 * @property int $ibge
 * @property int|null $pais_id
 * @property string|null $ddd
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cidade[] $cidades
 * @property-read int|null $cidades_count
 * @property-read \App\Models\Pais|null $pais
 * @method static \Illuminate\Database\Eloquent\Builder|Estado newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estado newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Estado query()
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereDdd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereIbge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado wherePaisId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereUf($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Estado whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Estado extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EstadoCivil
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil query()
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EstadoCivil whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class EstadoCivil extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Etnia
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etnia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Etnia extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ficha
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
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
	class Ficha extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\FichaSituacao
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao query()
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FichaSituacao whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class FichaSituacao extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Logradouro
 *
 * @property int $id
 * @property string $nome
 * @property string $cep
 * @property int $bairro_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Bairro $bairro
 * @property-read Collection|Escola[] $escolas
 * @property-read int|null $escolas_count
 * @property-read Collection|PessoaEndereco[] $pessoa_enderecos
 * @property-read int|null $pessoa_enderecos_count
 * @method static Builder|Logradouro newModelQuery()
 * @method static Builder|Logradouro newQuery()
 * @method static Builder|Logradouro query()
 * @method static Builder|Logradouro whereBairroId($value)
 * @method static Builder|Logradouro whereCep($value)
 * @method static Builder|Logradouro whereCreatedAt($value)
 * @method static Builder|Logradouro whereId($value)
 * @method static Builder|Logradouro whereNome($value)
 * @method static Builder|Logradouro whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class Logradouro extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\NecessidadeEspecial
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial query()
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|NecessidadeEspecial whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\NecessidadeEspecialFactory factory(...$parameters)
 */
	class NecessidadeEspecial extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pais
 *
 * @property int $id
 * @property string $nome
 * @property string|null $sigla
 * @property int $bacen
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Estado[] $estados
 * @property-read int|null $estados_count
 * @method static \Illuminate\Database\Eloquent\Builder|Pais newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereBacen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereSigla($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pais whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Pais extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Parentesco
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco query()
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Parentesco whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Parentesco extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read Sexo $sexo
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PessoaCondicaoMoradia[] $condicao_moradia
 * @property-read int|null $condicao_moradia_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PessoaCondicaoSocial[] $condicao_social
 * @property-read int|null $condicao_social_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PessoaDespesa[] $despesa
 * @property-read int|null $despesa_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PessoaEndereco[] $endereco
 * @property-read int|null $endereco_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PessoaEscolaridade[] $escolaridade
 * @property-read int|null $escolaridade_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PessoaEstadoCivil[] $estado_civil
 * @property-read int|null $estado_civil_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PessoaGrupoFamiliar[] $grupo_familiar
 * @property-read int|null $grupo_familiar_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PessoaNecessidadeEspecial[] $necessidade_especial
 * @property-read int|null $necessidade_especial_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PessoaSitTrabalhista[] $situacao_trabalhista
 * @property-read int|null $situacao_trabalhista_count
 * @method static \Database\Factories\PessoaFactory factory(...$parameters)
 */
	class Pessoa extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Database\Factories\PessoaCondicaoMoradiaFactory factory(...$parameters)
 */
	class PessoaCondicaoMoradia extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Database\Factories\PessoaCondicaoSocialFactory factory(...$parameters)
 */
	class PessoaCondicaoSocial extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Database\Factories\PessoaDespesaFactory factory(...$parameters)
 */
	class PessoaDespesa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PessoaEndereco
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int $logradouro_id
 * @property string $numero_lograd
 * @property string|null $complemento_lograd
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Logradouro $logradouro
 * @property-read \App\Models\Pessoa $pessoa
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereComplementoLograd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereLogradouroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereNumeroLograd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEndereco whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\PessoaEnderecoFactory factory(...$parameters)
 */
	class PessoaEndereco extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PessoaEscolaridade
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int|null $escola_id
 * @property string|null $serie
 * @property string|null $turma
 * @property string $escolaridade
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Escola|null $escola
 * @property-read \App\Models\Pessoa $pessoa
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereEscolaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereEscolaridade($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereSerie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereTurma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaEscolaridade whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\PessoaEscolaridadeFactory factory(...$parameters)
 */
	class PessoaEscolaridade extends \Eloquent {}
}

namespace App\Models{
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
	class PessoaEstadoCivil extends \Eloquent {}
}

namespace App\Models{
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
	class PessoaGrupoFamiliar extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PessoaNecessidadeEspecial
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $data
 * @property int $pessoa_id
 * @property int $necessidade_especial_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\NecessidadeEspecial $necessidade_especial
 * @property-read \App\Models\Pessoa $pessoa
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial query()
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial whereNecessidadeEspecialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial wherePessoaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PessoaNecessidadeEspecial whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Database\Factories\PessoaNecessidadeEspecialFactory factory(...$parameters)
 */
	class PessoaNecessidadeEspecial extends \Eloquent {}
}

namespace App\Models{
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
 * @method static \Database\Factories\PessoaSitTrabalhistaFactory factory(...$parameters)
 */
	class PessoaSitTrabalhista extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Sexo
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sexo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Sexo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SitTrabalhista
 *
 * @property int $id
 * @property string $descricao
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista query()
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista whereDescricao($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SitTrabalhista whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SitTrabalhista extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class User extends \Eloquent {}
}

