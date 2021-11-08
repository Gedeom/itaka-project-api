<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstadoCivil\EstadoCivilResource;
use App\Http\Resources\EstadoCivil\EstadoCivilResourceCollection;
use App\Http\Resources\Logradouro\LogradouroResource;
use App\Models\EstadoCivil;
use App\Services\ResponseService;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class EstadoCivilController extends Controller
{

    private $estado_civil;

    public function __construct(EstadoCivil $estado_civil)
    {
        $this->estado_civil = $estado_civil;
    }

    /**
     * Display a listing of the resource.
     *
     * @return EstadoCivilResourceCollection
     */
    public function index()
    {
        return new EstadoCivilResourceCollection($this->estado_civil->index());

    }

    /**
     * Display a listing of search the resource.
     *
     * @return EstadoCivilResourceCollection
     */
    public function search(Request $request)
    {
        return new EstadoCivilResourceCollection($this->estado_civil->search($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|EstadoCivilResource
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $estado_civil = $this->estado_civil->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('civil-status.store', null, $e);
        }
        DB::commit();

        return new EstadoCivilResource($estado_civil, array('type' => 'store', 'route' => 'civil-status.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|EstadoCivilResource
     */
    public function show($id)
    {
        try {
            $data = $this->estado_civil->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('civil-status.show', $id, $e);
        }
        return new EstadoCivilResource($data, array('type' => 'show', 'route' => 'civil-status.show'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|EstadoCivilResource
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $estado_civil = $this->estado_civil->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('civil-status.update', null, $e);
        }
        DB::commit();

        return new EstadoCivilResource($estado_civil, array('type' => 'store', 'route' => 'civil-status.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|EstadoCivilResource
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->estado_civil->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('civil-status.destroy', $id, $e);
        }
        DB::commit();
        return new EstadoCivilResource($data, array('type' => 'destroy', 'route' => 'civil-status.destroy'));
    }
}
