<?php

namespace App\Http\Resources\Escola;

use App\Services\ResponseService;
use Illuminate\Http\Resources\Json\JsonResource;

class EscolaResource extends JsonResource
{
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
            'escola' => $this->escola,
            'tipo_id' => $this->tipo_id,
            'tipo' => $this->tipo,
            'numero_lograd' => $this->numero_lograd,
            'complemento_lograd' => $this->complemento_lograd,
            'logradouro_id' => $this->logradouro_id,
            'logradouro' => $this->logradouro,
            'cep' => $this->cep,
            'bairro_id' => $this->bairro_id,
            'bairro' => $this->bairro,
            'cidade_id' => $this->cidade_id,
            'cidade' => $this->cidade,
            'estado_id' => $this->estado_id,
            'estado' => $this->estado,
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
