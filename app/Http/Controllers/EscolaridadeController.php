<?php

namespace App\Http\Controllers;

use App\Http\Resources\Escolaridade\EscolaridadeResource;
use App\Http\Resources\Escolaridade\EscolaridadeResourceCollection;
use App\Models\Escolaridade;
use App\Services\ResponseService;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class EscolaridadeController extends Controller
{
    private $escolaridade;

    public function __construct(Escolaridade $escolaridade)
    {
        $this->escolaridade = $escolaridade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return EscolaridadeResourceCollection
     */
    public function index()
    {
        return new EscolaridadeResourceCollection($this->escolaridade->index());

    }

    /**
     * Display a listing of search the resource.
     *
     * @return EscolaridadeResourceCollection
     */
    public function search(Request $request)
    {
        return new EscolaridadeResourceCollection($this->escolaridade->search($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|EscolaridadeResource
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $escolaridade = $this->escolaridade->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('schooling.store', null, $e);
        }
        DB::commit();

        return new EscolaridadeResource($escolaridade, array('type' => 'store', 'route' => 'schooling.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|EscolaridadeResource
     */
    public function show($id)
    {
        try {
            $data = $this->escolaridade->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('schooling.show', $id, $e);
        }
        return new EscolaridadeResource($data, array('type' => 'show', 'route' => 'schooling.show'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|EscolaridadeResource
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $escolaridade = $this->escolaridade->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('schooling.update', null, $e);
        }
        DB::commit();

        return new EscolaridadeResource($escolaridade, array('type' => 'store', 'route' => 'schooling.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|EscolaridadeResource
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->escolaridade->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('schooling.destroy', $id, $e);
        }
        DB::commit();
        return new EscolaridadeResource($data, array('type' => 'destroy', 'route' => 'schooling.destroy'));
    }
}
