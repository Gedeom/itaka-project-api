<?php

namespace App\Http\Controllers;

use App\Http\Resources\Pessoa\PessoaResource;
use App\Http\Resources\Pessoa\PessoaResourceCollection;
use App\Models\Pessoa;
use App\Services\ResponseService;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class PessoaController extends Controller
{

    private $pessoa;

    public function __construct(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return PessoaResourceCollection
     */
    public function index()
    {
        return new PessoaResourceCollection($this->pessoa->index());
    }

    /**
     * Display a listing of search the resource.
     *
     * @return PessoaResourceCollection
     */
    public function search(Request $request)
    {
        return new PessoaResourceCollection($this->pessoa->search($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|PessoaResource
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $pessoa = $this->pessoa->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('person.store', null, $e);
        }
        DB::commit();

        return new PessoaResource($pessoa, array('type' => 'store', 'route' => 'person.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|PessoaResource
     */
    public function show($id)
    {
        try {
            $data = $this->pessoa->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('person.show', $id, $e);
        }
        return new PessoaResource($data, array('type' => 'show', 'route' => 'person.show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|PessoaResource
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $pessoa = $this->pessoa->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('person.update', $id, $e);
        }
        DB::commit();

        return new PessoaResource($pessoa, array('type' => 'update', 'route' => 'person.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|PessoaResource
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->pessoa->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('person.destroy', $id, $e);
        }
        DB::commit();
        return new PessoaResource($data, array('type' => 'destroy', 'route' => 'person.destroy'));
    }
}
