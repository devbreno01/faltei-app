<?php
namespace App\Services;

use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;

class SubjectService {
    private $subject;

    public function __construct(Subject $subject)
    {
        $this->subject = $subject;
    }

    public function store(StoreSubjectRequest $request){
        try{
            $data = $request->validated();
            $data['tenant_id'] = $request->user()->tenant_id;
            
            $this->subject->create($data);

            return response()->json(["status" => "success",
                                    "data" => null,
                                    "message" => "Matéria cadastrada com sucesso"],201);

        }catch(\Exception $e){
            return response()->json(["status" => "failed",
                                    "data" => null,
                                    "message" => $e->getMessage()],400);
        }

    }

    public function getSubjects(){
        $subjects = $this->subject->paginate(10);

        return response()->json(["status" =>"success",
                                "data" => $subjects,
                                "message" => "Matérias exibidas com sucesso"],200);


    }

    public function getSubjectById($id){

        $subject = $this->subject->find($id) ?? null;
        if($subject == null){
            return response()->json(["status" =>"failed",
                            "data" => $subject,
                            "message" => "Matéria não encontrada no banco de dados"],500);
        }

        return response()->json(["status" =>"success",
                            "data" => $subject,
                            "message" => "Matéria encontrada com sucesso"],200);


    }

    public function update($validatedData, int $id){
        $subject = $this->subject->find($id);

        if($subject){
            try{
                $subject->update($validatedData);
                return $this->response("success",[null],"Matéria atualizada com sucesso", 200);
            }catch(\Exception $e){
                return $this->response("failed",[null],"falha ao atualizar o matéria", 304);
            }
        }
        return $this->response("failed",[null],"Matéria não encontrada", 500);


    }

    public function destroy(int $id){
        $subject = $this->subject->find($id);

        if($subject){
            try{
                $subject->delete();
                return $this->response("success",[null],"Matéria deletada com sucesso", 200);
            }catch(\Exception $e){
                return $this->response("failed",[null],"falha ao deletar o matéria", 500);
            }
        }

        return $this->response("failed",[null],"Matéria não encontrada", 500);
    }

    private function response(string $status, Array $data=[] , string $message, int $statusCode)
    {
        return response()->json(["status" => $status,
                                    "data" => $data,
                                    "message" => $message],$statusCode);
    }
}
