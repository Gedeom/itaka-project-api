<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstadoCivil\EstadoCivilResource;
use App\Http\Resources\EstadoCivil\EstadoCivilResourceCollection;
use App\Http\Resources\Etnia\EtniaResource;
use App\Http\Resources\Etnia\EtniaResourceCollection;
use App\Http\Resources\Logradouro\LogradouroResource;
use App\Http\Resources\Parentesco\ParentescoResource;
use App\Http\Resources\Parentesco\ParentescoResourceCollection;
use App\Http\Resources\SitTrabalhista\SitTrabalhistaResourceCollection;
use App\Http\Resources\SitTrabalhista\SitTrabalhistaResource;
use App\Models\EstadoCivil;
use App\Models\Etnia;
use App\Models\Parentesco;
use App\Models\SitTrabalhista;
use App\Services\ResponseService;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class SitTrabalhistaController extends Controller
{

    private $sit_trabalhista;

    public function __construct(SitTrabalhista $sit_trabalhista)
    {
        $this->sit_trabalhista = $sit_trabalhista;
    }

    /**
     * Display a listing of the resource.
     *
     * @return SitTrabalhistaResourceCollection
     */
    public function index()
    {
        return new SitTrabalhistaResourceCollection($this->sit_trabalhista->index());

    }

    /**
     * Display a listing of search the resource.
     *
     * @return SitTrabalhistaResourceCollection
     */
    public function search(Request $request)
    {
        return new SitTrabalhistaResourceCollection($this->sit_trabalhista->search($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|SitTrabalhistaResource
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $sit_trabalhista = $this->sit_trabalhista->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('work-situation.store', null, $e);
        }
        DB::commit();

        return new SitTrabalhistaResource($sit_trabalhista, array('type' => 'store', 'route' => 'work-situation.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|SitTrabalhistaResource
     */
    public function show($id)
    {
        try {
            $data = $this->sit_trabalhista->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('work-situation.show', $id, $e);
        }
        return new SitTrabalhistaResource($data, array('type' => 'show', 'route' => 'work-situation.show'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|SitTrabalhistaResource
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $sit_trabalhista = $this->sit_trabalhista->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('work-situation.update', null, $e);
        }
        DB::commit();

        return new SitTrabalhistaResource($sit_trabalhista, array('type' => 'store', 'route' => 'work-situation.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|SitTrabalhistaResource
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->sit_trabalhista->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('work-situation.destroy', $id, $e);
        }
        DB::commit();
        return new SitTrabalhistaResource($data, array('type' => 'destroy', 'route' => 'work-situation.destroy'));
    }
}
