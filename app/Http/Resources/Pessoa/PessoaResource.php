<?php

namespace App\Http\Resources\Pessoa;

use App\Services\ResponseService;
use Illuminate\Http\Resources\Json\JsonResource;

class PessoaResource extends JsonResource
{
    /**
     * @var
     */
    private $config;

    /**
     * Create a new resource instance.
     *
     * @param  mixed  $resource
     * @return void
     */
    public function __construct($resource, $config = array())
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);

        $this->config = $config;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'data' => $this->data,
            'nome' => $this->nome,
            'sexo_id' => $this->sexo_id,
            'sexo' => $this->sexo,
            'dt_nascimento' => $this->dt_nascimento,
            'doc' => $this->doc,
            'rg' => $this->rg,
            'rg_orgao_expedidor' => $this->rg_orgao_expedidor,
            'naturalidade_id' => $this->naturalidade_id,
            'naturalidade' => $this->naturalidade,
            'etnia_id' => $this->etnia_id,
            'etnia' => $this->etnia,
            'email' => $this->email,
            'tel_residencia' => $this->tel_residencia,
            'tel_recado' => $this->tel_recado,
            'tel_celular' => $this->tel_celular,
            'tel_emerg1' => $this->tel_emerg1,
            'tel_emerg2' => $this->tel_emerg2,
            'nome_contato_emerg' => $this->nome_contato_emerg,
            'alergia' => $this->alergia,
            'sit_medica_especial' => $this->sit_medica_especial,
            'medicacao_controlada' => $this->medicacao_controlada,
            'fratura_cirurgia' => $this->fratura_cirurgia,
            'recomendacao_emergencia_med' => $this->recomendacao_emergencia_med,
            'renda' => $this->renda,
            'grupo_familiar' => $this->grupo_familiar,
            'endereco' => $this->endereco,
            'condicoes_moradia' => $this->condicoes_moradia,
            'condicoes_sociais' => $this->condicoes_sociais,
            'despesas' => $this->despesas,
            'escolaridade' => $this->escolaridade,
            'estado_civil' => $this->estado_civil,
            'necessidades_especiais' => $this->necessidades_especiais,
            'situacao_trabalhista' => $this->situacao_trabalhista,
        ];
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function with($request)
    {
        return ResponseService::default($this->config,$this->id);
    }

    /**
     * Customize the outgoing response for the resource.
     *
     * @param  \Illuminate\Http\Request
     * @param  \Illuminate\Http\Response
     * @return void
     */
    public function withResponse($request, $response)
    {
        $response->setStatusCode(200);
    }
}
