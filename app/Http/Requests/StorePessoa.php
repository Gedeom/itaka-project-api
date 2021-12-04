<?php

namespace App\Http\Requests;

use App\Models\Cidade;
use App\Models\CondicaoMoradia;
use App\Models\CondicaoSocial;
use App\Models\Despesa;
use App\Models\Escola;
use App\Models\EstadoCivil;
use App\Models\Etnia;
use App\Models\Logradouro;
use App\Models\NecessidadeEspecial;
use App\Models\Parentesco;
use App\Models\Pessoa;
use App\Models\Sexo;
use App\Models\SitTrabalhista;
use App\Models\Utils\ValidationUtils;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StorePessoa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'data' => 'required|date_format:d/m/Y',
            'nome' => 'required',
            'sexo_id' => [
                'required',
                Rule::in(Sexo::pluck('id', 'id'))
            ],
            'dt_nascimento' => 'required',
            'doc' => 'required',
            'rg' => 'required',
            'rg_orgao_expedidor' => 'required',
            'naturalidade_id' => [
                'required',
                Rule::in(Cidade::pluck('id', 'id'))
            ],
            'etnia_id' => [
                'required',
                Rule::in(Etnia::pluck('id', 'id'))
            ],
            'email' => 'string|nullable|email',
            'tel_residencia' => 'nullable|string',
            'tel_recado' => 'nullable|string',
            'tel_celular' => 'nullable|string',
            'tel_emerg1' => 'nullable|string',
            'tel_emerg2' => 'nullable|string',
            'nome_contato_emerg' => Rule::requiredIf($this->tel_emerg1 || $this->tel_emerg2),
            'alergia' => 'nullable|string',
            'sit_medica_especial' => 'nullable|string',
            'medicacao_controlada' => 'nullable|string',
            'fratura_cirurgia' => 'nullable|string',
            'recomendacao_emergencia_med' => 'nullable|string',
            'renda' => 'present',
            'estado_civil_id' => [
                'required',
                Rule::in(EstadoCivil::pluck('id', 'id'))
            ],
            'logradouro_id' => [
                'required',
                Rule::in(Logradouro::pluck('id', 'id'))
            ],
            'numero_lograd' => 'required',
            'complemento_lograd' => 'nullable|string',
            'escola_id' => [
                'nullable|string',
                Rule::in(Escola::pluck('id', 'id'))
            ],
            'turma' => 'nullable|string',
            'serie' => 'nullable|string',
            'escolaridade' => 'required',
            'sit_trabalhista_id' => [
                'required',
                Rule::in(SitTrabalhista::pluck('id', 'id'))
            ],
            'despesas' => 'nullable',
            'condicoes_sociais' => 'nullable',
            'condicoes_moradia' => 'nullable',
            'grupo_familiar' => 'nullable',
            'necessidades_especiais' => 'nullable',
        ];
    }

    /**
     * Validar dados
     *
     * @param Validator $validator
     */
    public function withValidator($validator)
    {
        $id = $this->route('address') ?: 0;

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'msg' => 'Ops! Algum campo obrigatório não foi preenchido.',
                'status' => false,
                'errors' => $validator->errors(),
                'url' => route($id ? 'person.update' : 'person.store')
            ], 403));
        }

        dd($this->despesas);
        $despesas = json_decode($this->despesas,true);
        $condicoes_sociais = json_decode($this->condicoes_sociais,true);
        $condicoes_moradia = json_decode($this->condicoes_moradia,true);
        $grupo_familiar = json_decode($this->grupo_familiar,true);
        $necessidades_especiais = json_decode($this->necessidades_especiais,true);
        $data = Carbon::createFromFormat('d/m/Y', $this->data);

        $arr_person_dependencies = [
            'despesas' => $despesas,
            'condicoes_sociais' => $condicoes_sociais,
            'condicoes_moradia' => $condicoes_moradia,
            'grupo_familiar' => $grupo_familiar,
            'necessidades_especiais' => $necessidades_especiais,
        ];

//        dd($arr_person_dependencies);
        $validate_person_dependencies = \Validator::make($arr_person_dependencies, [
            'despesas.*.despesa_id' => [
                'required',
                Rule::in(Despesa::pluck('id', 'id')),
            ],
            'despesas.*.vlr' => 'required|numeric',

            'condicoes_sociais.*.condicao_social_id' => [
                'required',
                Rule::in(CondicaoSocial::pluck('id', 'id'))
            ],

            'condicoes_sociais.*.resposta' => 'required|in:Sim,Não',
            'condicoes_sociais.*.descricao' => 'required_if:condicoes_sociais.*.resposta,Sim',

            'condicoes_moradia.*.condicao_moradia_id' => [
                'required',
                Rule::in(CondicaoMoradia::pluck('id', 'id'))
            ],

            'condicoes_moradia.*.resposta' => 'required',

            'grupo_familiar.*.parente_id' => [
                'required',
                Rule::notIn([$id]),
                Rule::in(Pessoa::pluck('id', 'id'))
            ],

            'grupo_familiar.*.parentesco_id' => [
                'required',
                Rule::in(Parentesco::pluck('id', 'id'))
            ],

            'necessidades_especiais.*.necessidade_especial_id' => [
                'required',
                Rule::in(NecessidadeEspecial::pluck('id', 'id'))
            ]
        ]);

        $validate_person_dependencies->sometimes('condicoes_moradia.*.resposta','in', function($input,$item){

            return CondicaoMoradia::$resposta[$item['condicao_moradia_id']] === $item['resposta'];
        });

        $validate_person_dependencies->sometimes('condicoes_moradia.*.descricao','required', function($input,$item){
            $opt_descricao = CondicaoMoradia::getOptionDescricao($item['condicao_moradia_id'],$item['resposta']);

            return $opt_descricao->force;
        });


        if ($validate_person_dependencies->fails()) {
            throw new HttpResponseException(response()->json([
                'msg' => 'Ops! Erro na validação dos dados!',
                'status' => false,
                'errors' => $validate_person_dependencies->errors(),
                'url' => route($id ? 'person.update' : 'person.store')
            ], 403));
        }

        $doc_is_valid = ValidationUtils::validateDoc($this->doc);
        $tel_res_is_valid = ValidationUtils::validateTelefone($this->tel_residencia);
        $tel_rec_is_valid = ValidationUtils::validateTelefone($this->tel_recado);
        $tel_cel_is_valid = ValidationUtils::validateTelefone($this->tel_celular);
        $tel_emerg1_is_valid = ValidationUtils::validateTelefone($this->tel_emerg1);
        $tel_emerg2_is_valid = ValidationUtils::validateTelefone($this->tel_emerg2);


        if (!$doc_is_valid) {
            $validator->errors()->add('doc', 'Documento não é valido!');
        }

        if (($this->tel_residencia && !$tel_res_is_valid)) {
            $validator->errors()->add('tel_residencia', 'Telefone de residência não é válido!');
        }

        if (($this->tel_recado && !$tel_rec_is_valid)) {
            $validator->errors()->add('tel_recado', 'Telefone de recado não é válido!');
        }

        if (($this->tel_celular && !$tel_cel_is_valid)) {
            $validator->errors()->add('tel_celular', 'Telefone celular não é válido!');
        }

        if (($this->tel_emerg1 && !$tel_emerg1_is_valid)) {
            $validator->errors()->add('tel_emerg1', 'Telefone emergencial 1 não é válido!');
        }

        if (($this->tel_emerg2 && !$tel_emerg2_is_valid)) {
            $validator->errors()->add('tel_emerg2', 'Telefone emergencial 2 não é válido!');
        }

        if ($id) {
            $pessoa = Pessoa::find($id);

            foreach ($pessoa->fichas as $ficha) {
                if ($ficha->data->eq($data)) {
                    if (!count($despesas)) {
                        $validator->errors()->add('despesas', 'Despesas precisa ser preenchido, pois existe ficha na data!');
                    }

                    if (!count($condicoes_sociais)) {
                        $validator->errors()->add('condicoes_sociais', 'Condições sociais precisa ser preenchido, pois existe ficha na data!');
                    }

                    if (!count($condicoes_moradia)) {
                        $validator->errors()->add('condicoes_moradia', 'Condições moradia precisa ser preenchido, pois existe ficha na data!');
                    }

                    if (!count($grupo_familiar)) {
                        $validator->errors()->add('grupo_familiar', 'Grupo familiar precisa ser preenchido, pois existe ficha na data!');
                    }
                }
            }
        }

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'msg' => 'Ops! Algum campo obrigatório não foi preenchido.',
                'status' => false,
                'errors' => $validator->errors(),
                'url' => route($id ? 'person.update' : 'person.store')
            ], 403));
        }
    }
}
