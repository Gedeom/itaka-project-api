<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFicha;
use App\Http\Resources\Ficha\FichaResource;
use App\Http\Resources\Ficha\FichaResourceCollection;
use App\Models\Ficha;
use App\Services\ResponseService;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class FichaController extends Controller
{

    private $ficha;

    public function __construct(Ficha $ficha)
    {
        $this->ficha = $ficha;
    }

    /**
     * Display a listing of the resource.
     *
     * @return FichaResourceCollection
     */
    public function index()
    {
        return new FichaResourceCollection($this->ficha->index());
    }

    /**
     * Display a listing of search the resource.
     *
     * @return FichaResourceCollection
     */
    public function search(Request $request)
    {
        return new FichaResourceCollection($this->ficha->search($request->all()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|FichaResource
     */
    public function store(StoreFicha $request)
    {
        DB::beginTransaction();
        try {
            $ficha = $this->ficha->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('card.store', null, $e);
        }
        DB::commit();

        return new FichaResource($ficha, array('type' => 'store', 'route' => 'card.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|FichaResource
     */
    public function show($id)
    {
        try {
            $data = $this->ficha->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('card.show', $id, $e);
        }
        return new FichaResource($data, array('type' => 'show', 'route' => 'card.show'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|FichaResource
     */
    public function update(StoreFicha $request, $id)
    {
        DB::beginTransaction();
        try {
            $ficha = $this->ficha->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('card.update', $id, $e);
        }
        DB::commit();

        return new FichaResource($ficha, array('type' => 'update', 'route' => 'card.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|FichaResource
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->ficha->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('card.destroy', $id, $e);
        }
        DB::commit();
        return new FichaResource($data, array('type' => 'destroy', 'route' => 'card.destroy'));
    }
}
