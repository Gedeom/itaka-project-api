<?php

namespace App\Http\Controllers;

use App\Http\Resources\Cidade\CidadeResource;
use App\Http\Resources\Cidade\CidadeResourceCollection;
use App\Models\Cidade;
use App\Services\ResponseService;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class CidadeController extends Controller
{

    private $cidade;

    public function __construct(Cidade $cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return CidadeResourceCollection
     */
    public function index()
    {
        return new CidadeResourceCollection($this->cidade->index());

    }

    /**
     * Display a listing of search the resource.
     *
     * @return CidadeResourceCollection
     */
    public function search(Request $request)
    {
        return new CidadeResourceCollection($this->cidade->search($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|CidadeResource
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $cidade = $this->cidade->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('city.store', null, $e);
        }
        DB::commit();

        return new CidadeResource($cidade, array('type' => 'store', 'route' => 'city.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|CidadeResource
     */
    public function show($id)
    {
        try {
            $data = $this->cidade->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('city.show', $id, $e);
        }
        return new CidadeResource($data, array('type' => 'show', 'route' => 'city.show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|CidadeResource
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $cidade = $this->cidade->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('city.update', null, $e);
        }
        DB::commit();

        return new CidadeResource($cidade, array('type' => 'store', 'route' => 'city.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|CidadeResource
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->cidade->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('city.destroy', $id, $e);
        }
        DB::commit();
        return new CidadeResource($data, array('type' => 'destroy', 'route' => 'city.destroy'));
    }
}
