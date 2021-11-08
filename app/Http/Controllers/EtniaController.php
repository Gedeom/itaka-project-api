<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstadoCivil\EstadoCivilResource;
use App\Http\Resources\EstadoCivil\EstadoCivilResourceCollection;
use App\Http\Resources\Etnia\EtniaResource;
use App\Http\Resources\Etnia\EtniaResourceCollection;
use App\Http\Resources\Logradouro\LogradouroResource;
use App\Models\EstadoCivil;
use App\Models\Etnia;
use App\Services\ResponseService;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class EtniaController extends Controller
{

    private $etnia;

    public function __construct(Etnia $etnia)
    {
        $this->etnia = $etnia;
    }

    /**
     * Display a listing of the resource.
     *
     * @return EtniaResourceCollection
     */
    public function index()
    {
        return new EtniaResourceCollection($this->etnia->index());

    }

    /**
     * Display a listing of search the resource.
     *
     * @return EtniaResourceCollection
     */
    public function search(Request $request)
    {
        return new EtniaResourceCollection($this->etnia->search($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|EtniaResource
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $etnia = $this->etnia->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('race.store', null, $e);
        }
        DB::commit();

        return new EtniaResource($etnia, array('type' => 'store', 'route' => 'race.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|EtniaResource
     */
    public function show($id)
    {
        try {
            $data = $this->etnia->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('race.show', $id, $e);
        }
        return new EtniaResource($data, array('type' => 'show', 'route' => 'race.show'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|EtniaResource
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $etnia = $this->etnia->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('etnia.update', null, $e);
        }
        DB::commit();

        return new EtniaResource($etnia, array('type' => 'store', 'route' => 'etnia.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|EtniaResource
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->etnia->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('race.destroy', $id, $e);
        }
        DB::commit();
        return new EtniaResource($data, array('type' => 'destroy', 'route' => 'race.destroy'));
    }
}
