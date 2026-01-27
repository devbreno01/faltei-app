<?php

namespace App\Services;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserService {
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function store(StoreUserRequest $request){
        try{
            $this->user->create($request->validated());
            return response()->json(["status" => "success",
                                    "data" => null,
                                    "message" => "Usuário cadastrado com sucesso"],201);

        }catch(\Exception $e){
            return response()->json(["status" => "failed",
                                    "data" => null,
                                    "message" => $e->getMessage()],400);
        }

    }

    public function getUsers(){
        $users = $this->user->all();

        return response()->json(["status" =>"success",
                                "data" => $users,
                                "message" => "Usuários exibidos com sucesso"],200);


    }

    public function getUserById($id){

        $user = $this->user->find($id) ?? null;
        if($user == null){
            return response()->json(["status" =>"failed",
                            "data" => $user,
                            "message" => "Usuário não encontrado no banco de dados"],500);
        }

        return response()->json(["status" =>"success",
                            "data" => $user,
                            "message" => "Usuário encontrado com sucesso"],200);


    }

    public function update($validatedData, int $id){
        $user = $this->user->find($id);

        if($user){
            try{

                $user->update($validatedData);
                return $this->response("success",[null],"usuário atualizado com sucesso", 200);
            }catch(\Exception $e){
                return $this->response("failed",[null],"falha ao atualizar o usuário", 304);
            }
        }
        return $this->response("failed",[null],"usuário não encontrado", 500);


    }

    public function destroy(int $id){
        $user = $this->user->find($id);

        if($user){
            try{
                $user->delete();
                return $this->response("success",[null],"usuário deletado com sucesso", 200);
            }catch(\Exception $e){
                return $this->response("failed",[null],"falha ao deletar o usuário", 500);
            }
        }

        return $this->response("failed",[null],"usuário não encontrado", 500);
    }

    private function response(string $status, Array $data=[] , string $message, int $statusCode)
    {
        return response()->json(["status" => $status,
                                    "data" => $data,
                                    "message" => $message],$statusCode);
    }
}
