<?php

namespace App\Http\Requests;

use App\Models\Ficha;
use App\Models\FichaSituacao;
use App\Models\Parentesco;
use App\Models\Pessoa;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class StoreFicha extends FormRequest
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
            'data' => 'required',
            'numero' => 'integer|required',
            'situacao_id' => [
                'required',
                Rule::in(FichaSituacao::pluck('id', 'id'))
                ],
            'responsavel_id' => [
                'nullable',
                Rule::in(Pessoa::pluck('id', 'id'))
            ],
            'resp_parentesco_id' => [
                'nullable|required_if:responsavel_id',
                Rule::in(Parentesco::pluck('id', 'id'))
            ],
            'processo_is_deferido' => 'nullable',
            'parecer_assistente_social' => 'nullable',
            'outros_gastos' => 'nullable',
            'situacao_socieconomica_familiar' => 'nullable',
            'obs_nescessarias' => 'nullable',
        ];
    }

    public function withValidator($validator)
    {
        $id = (int) $this->route('card');

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'msg' => 'Ops! Algum campo obrigatório não foi preenchido.',
                'status' => false,
                'errors' => $validator->errors(),
                'url' => route($id ? 'card.update' : 'card.store')
            ], 403));
        }

        $pessoa = Pessoa::where('doc','=',$this->doc)
            ->first();

        $validacao_pessoa = StorePessoa::dataValidation($this->all(),$pessoa->id ?? 0);

        if($validacao_pessoa->errors()->count()){
            throw new HttpResponseException(response()->json([
                'msg' => 'Ops! Algum campo obrigatório não foi preenchido.',
                'status' => false,
                'errors' => $validacao_pessoa->errors(),
                'url' => route($id ? 'card.update' : 'card.store')
            ], 403));
        }
    }
}
