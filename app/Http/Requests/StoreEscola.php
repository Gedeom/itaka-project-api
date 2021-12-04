<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreEscola extends FormRequest
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
            'escola' => 'required',
            'logradouro_id' => 'required',
            'numero_lograd' => 'required',
            'complemento_lograd' => 'string|nullable',
        ];
    }

    public function withValidator($validator)
    {
        $id = $this->route('school');

        if ($validator->fails()) {
            throw new HttpResponseException(response()->json([
                'msg' => 'Ops! Algum campo obrigatório não foi preenchido.',
                'status' => false,
                'errors' => $validator->errors(),
                'url' => route($id ? 'school.update' : 'school.store')
            ], 403));
        }
    }
}
