<?php

namespace App\Http\Controllers;

use App\Http\Resources\EstadoCivil\EstadoCivilResource;
use App\Http\Resources\EstadoCivil\EstadoCivilResourceCollection;
use App\Http\Resources\Etnia\EtniaResource;
use App\Http\Resources\Etnia\EtniaResourceCollection;
use App\Http\Resources\Logradouro\LogradouroResource;
use App\Http\Resources\Parentesco\ParentescoResource;
use App\Http\Resources\Parentesco\ParentescoResourceCollection;
use App\Models\EstadoCivil;
use App\Models\Etnia;
use App\Models\Parentesco;
use App\Services\ResponseService;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class ParentescoController extends Controller
{

    private $parentesco;

    public function __construct(Parentesco $parentesco)
    {
        $this->parentesco = $parentesco;
    }

    /**
     * Display a listing of the resource.
     *
     * @return ParentescoResourceCollection
     */
    public function index()
    {
        return new ParentescoResourceCollection($this->parentesco->index());

    }

    /**
     * Display a listing of search the resource.
     *
     * @return ParentescoResourceCollection
     */
    public function search(Request $request)
    {
        return new ParentescoResourceCollection($this->parentesco->search($request->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|ParentescoResource
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $parentesco = $this->parentesco->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('kinship.store', null, $e);
        }
        DB::commit();

        return new ParentescoResource($parentesco, array('type' => 'store', 'route' => 'kinship.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|ParentescoResource
     */
    public function show($id)
    {
        try {
            $data = $this->parentesco->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('kinship.show', $id, $e);
        }
        return new ParentescoResource($data, array('type' => 'show', 'route' => 'kinship.show'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|ParentescoResource
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $parentesco = $this->parentesco->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('kinship.update', null, $e);
        }
        DB::commit();

        return new ParentescoResource($parentesco, array('type' => 'store', 'route' => 'kinship.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|ParentescoResource
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->parentesco->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('kinship.destroy', $id, $e);
        }
        DB::commit();
        return new ParentescoResource($data, array('type' => 'destroy', 'route' => 'kinship.destroy'));
    }
}
