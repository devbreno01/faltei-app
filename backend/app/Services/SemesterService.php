<?php

namespace App\Services;

use App\Models\Semester;
use App\Http\Requests\StoreSemesterRequest;

class SemesterService {
    private $semester;

    public function __construct(Semester $semester)
    {
        $this->semester = $semester;
    }

    public function store(StoreSemesterRequest $request){
        try{
            $data = $request->validated();

            $data['tenant_id'] = $request->user()->tenant_id;
            $data['user_id']   = $request->user()->id;

            $this->semester->create($data);
            return response()->json(["status" => "success",
                                    "data" => null,
                                    "message" => "Semestre cadastrado com sucesso"],201);

        }catch(\Exception $e){
            return response()->json(["status" => "failed",
                                    "data" => null,
                                    "message" => $e->getMessage()],400);
        }

    }

    public function getSemesters(){
        try{
            $semesters = $this->semester->paginate(10);

            return response()->json(["status" =>"success",
                                    "data" => $semesters,
                                    "message" => "Semestres exibidos com sucesso"],200);

        }catch(\Exception $e){
            return response()->json(["status" =>"error",
                                "message" => $e->getMessage()],500);
        }
    }

    public function getSemesterById($id){

        $semester = $this->semester->find($id) ?? null;
        if($semester == null){
            return response()->json(["status" =>"failed",
                            "data" => $semester,
                            "message" => "Semestre não encontrado no banco de dados"],500);
        }

        return response()->json(["status" =>"success",
                            "data" => $semester,
                            "message" => "Semestre encontrado com sucesso"],200);


    }

    public function update($validatedData, int $id){
        $semester = $this->semester->find($id);

        if($semester){
            try{
                $semester->update($validatedData);
                return $this->response("success",[null],"semestre atualizado com sucesso", 200);
            }catch(\Exception $e){
                return $this->response("failed",[null],"falha ao atualizar o semestre", 304);
            }
        }
        return $this->response("failed",[null],"semestre não encontrado", 500);


    }

    public function destroy(int $id){
        $semester = $this->semester->find($id);

        if($semester){
            try{
                $semester->delete();
                return $this->response("success",[null],"Semestre deletado com sucesso", 200);
            }catch(\Exception $e){
                return $this->response("failed",[null],"falha ao deletar o semestre", 500);
            }
        }

        return $this->response("failed",[null],"semestre não encontrado", 500);
    }

    private function response(string $status, Array $data=[] , string $message, int $statusCode)
    {
        return response()->json(["status" => $status,
                                    "data" => $data,
                                    "message" => $message],$statusCode);
    }
}
