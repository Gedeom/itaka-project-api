<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserResourceCollection;
use App\Models\User;
use App\Services\ResponseService;
use DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return UserResourceCollection
     */
    public function index()
    {
        return new UserResourceCollection($this->user->index());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse|UserResource
     */
    public function store(StoreUser $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->user->createOrUpdate($request->all());
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('users.store', null, $e);
        }
        DB::commit();

        return new UserResource($user, array('type' => 'store', 'route' => 'users.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|UserResource
     */
    public
    function show($id)
    {
        try {
            $data = $this->user->show($id);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('users.show', $id, $e);
        }
        return new UserResource($data, array('type' => 'show', 'route' => 'users.show'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|UserResource
     */
    public
    function update(StoreUser $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->user->createOrUpdate($request->all(), $id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('users.update', $id, $e);
        }
        DB::commit();

        return new UserResource($user, array('type' => 'update', 'route' => 'users.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse|UserResource|Response
     */
    public
    function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->user->remove($id);
        } catch (Throwable | Exception $e) {
            DB::rollBack();
            return ResponseService::exception('user.destroy', $id, $e);
        }
        DB::commit();
        return new UserResource($data, array('type' => 'destroy', 'route' => 'user.destroy'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            $token = $this
                ->user
                ->login($credentials);
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('users.login', null, $e);
        }
        return response()->json(compact('token'));
    }

    /**
     * Logout user
     *
     * @param Request $request
     * @return JsonResponse|UserResource|Response
     */
    public function logout(Request $request)
    {
        try {
            $this
                ->user
                ->logout($request->input('token'));
        } catch (Throwable | Exception $e) {
            return ResponseService::exception('users.logout', null, $e);
        }

        return response(['status' => true, 'msg' => 'Deslogado com sucesso'], 200);
    }

}
