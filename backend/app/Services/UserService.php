<?php

namespace App\Service;
use App\Models\User;

class UserService {
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function store($request){
        return $this->user->create($request);
    }

    public function getUsers(){
        return $this->user->all();
    }

    public function getUserById($id){
        return $this->user->find($id) ?? null;
    }

    public function update($validatedData, int $id){
        $user = $this->user->find($id);

        if($user){
            return $user->update($validatedData);
        }
    }
    public function destroy(int $id){
        $user = $this->user->find($id);

        if($user){
            return $user->delete();
        }
    }
}
