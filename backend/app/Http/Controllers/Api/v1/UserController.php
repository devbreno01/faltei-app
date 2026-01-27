<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function getUsers(){
        return $this->service->getUsers();
    }

    public function store(StoreUserRequest $request){
        return $this->service->store($request);
    }

    public function getUser($id){
        return $this->service->getUserById($id);
    }

    public function updateUser(StoreUserRequest $request, $id)
    {
        return $this->service->update($request->validated(),$id);

    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }

}
