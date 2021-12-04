<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEscola;
use App\Http\Resources\Escola\EscolaResource;
use App\Http\Resources\Escola\EscolaResourceCollection;
use App\Models\Escola;
use App\Services\ResponseService;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class EscolaController extends Controller
{

    private $escola;

    public function __construct(Escola $escola)
    {
        $this->escola = $escola;
    }

    /**
     * Display a listing of the resource.
     *
     * @return EscolaResourceCollection
     */
    public function index()
    {
        return new EscolaResourceCollection($this->escola->index());

    }

    /**
     * Display a listing of search the resource.
     *
     * @return EscolaResourceCollection
     */
    public function search(Request $request)
    {
        return new EscolaResourceCollection($this->escola->search($request->all()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|EscolaResource
     */
    public function store(StoreEscola $request)
    {
        DB::beginTransaction();
        try {
            $escola = $this->escola->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('school.store', null, $e);
        }
        DB::commit();

        return new EscolaResource($escola, array('type' => 'store', 'route' => 'school.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|EscolaResource
     */
    public function show($id)
    {
        try {
            $data = $this->escola->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('school.show', $id, $e);
        }
        return new EscolaResource($data, array('type' => 'show', 'route' => 'school.show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|EscolaResource
     */
    public function update(StoreEscola $request, $id)
    {
        DB::beginTransaction();
        try {
            $escola = $this->escola->createOrUpdate($request->all(), $id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('school.update', $id, $e);
        }
        DB::commit();

        return new EscolaResource($escola, array('type' => 'update', 'route' => 'school.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|EscolaResource
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->escola->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('school.destroy', $id, $e);
        }
        DB::commit();
        return new EscolaResource($data, array('type' => 'destroy', 'route' => 'school.destroy'));
    }
}
