<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogradouro;
use App\Http\Resources\Logradouro\LogradouroResource;
use App\Http\Resources\Logradouro\LogradouroResourceCollection;
use App\Models\Logradouro;
use App\Services\ResponseService;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Exception;
use Throwable;

class LogradouroController extends Controller
{
    private $logradouro;

    public function __construct(Logradouro $logradouro)
    {
        $this->logradouro = $logradouro;
    }

    /**
     * Display a listing of the resource.
     *
     * @return LogradouroResourceCollection
     */
    public function index()
    {
        return new LogradouroResourceCollection($this->logradouro->index());
    }

    /**
     * Display a listing of search the resource.
     *
     * @return LogradouroResourceCollection
     */
    public function search(Request $request)
    {
        return new LogradouroResourceCollection($this->logradouro->search($request->all()));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|LogradouroResource
     */
    public function store(StoreLogradouro $request)
    {
        DB::beginTransaction();
        try {
            $logradouro = $this->logradouro->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('address.store', null, $e);
        }
        DB::commit();

        return new LogradouroResource($logradouro, array('type' => 'store', 'route' => 'address.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|LogradouroResource
     */
    public function show($id)
    {
        try {
            $data = $this->logradouro->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('address.show', $id, $e);
        }
        return new LogradouroResource($data, array('type' => 'show', 'route' => 'address.show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|LogradouroResource
     */
    public function update(StoreLogradouro $request, $id)
    {
        DB::beginTransaction();
        try {
            $logradouro = $this->logradouro->createOrUpdate($request->all(), $id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('address.update', $id, $e);
        }
        DB::commit();

        return new LogradouroResource($logradouro, array('type' => 'update', 'route' => 'address.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|LogradouroResource
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->logradouro->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('address.destroy', $id, $e);
        }
        DB::commit();
        return new LogradouroResource($data, array('type' => 'destroy', 'route' => 'address.destroy'));
    }
}
