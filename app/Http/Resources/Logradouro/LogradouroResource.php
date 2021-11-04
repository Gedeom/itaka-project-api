<?php

namespace App\Http\Resources\Logradouro;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\ResponseService;

class LogradouroResource extends JsonResource
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
            'logradouro' => $this->nome,
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
