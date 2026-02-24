<?php
namespace App\Services;

use App\Models\SubjectDay;
use App\Http\Requests\StoreSubjectDaysRequest;

class SubjectDayService {
    private $subjectDay;

    public function __construct(SubjectDay $subjectDay)
    {
        $this->subjectDay = $subjectDay;
    }

    public function store(StoreSubjectDaysRequest $request){
        try{

            $this->subjectDay->create($request->validated());
            return response()->json(["status" => "success",
                                    "data" => null,
                                    "message" => "Dia da matéria cadastrado com sucesso"],201);

        }catch(\Exception $e){
            return response()->json(["status" => "failed",
                                    "data" => null,
                                    "message" => $e->getMessage()],400);
        }

    }

    public function getSubjectDays(){
        $subjectDays = $this->subjectDay->paginate(10);

        return response()->json(["status" =>"success",
                                "data" => $subjectDays,
                                "message" => "Dias da matéria exibidos com sucesso"],200);


    }

    public function getSubjectDayById($id){

        $subjectDay = $this->subjectDay->find($id) ?? null;
        if($subjectDay == null){
            return response()->json(["status" =>"failed",
                            "data" => $subjectDay,
                            "message" => "Dia da matéria não encontrada no banco de dados"],500);
        }

        return response()->json(["status" =>"success",
                            "data" => $subjectDay,
                            "message" => "Dia da matéria encontrada com sucesso"],200);


    }

    public function update($validatedData, int $id){
        $subjectDay = $this->subjectDay->find($id);

        if($subjectDay){
            try{
                $subjectDay->update($validatedData);
                return $this->response("success",[null],"Dia da matéria atualizada com sucesso", 200);
            }catch(\Exception $e){
                return $this->response("failed",[null],"falha ao atualizar o dia da matéria", 304);
            }
        }
        return $this->response("failed",[null],"Dia da matéria não encontrada", 500);


    }

    public function destroy(int $id){
        $subjectDay = $this->subjectDay->find($id);

        if($subjectDay){
            try{
                $subjectDay->delete();
                return $this->response("success",[null],"Dia da matéria deletada com sucesso", 200);
            }catch(\Exception $e){
                return $this->response("failed",[null],"falha ao deletar o dia da matéria", 500);
            }
        }

        return $this->response("failed",[null],"Dia da matéria não encontrada", 500);
    }

    private function response(string $status, Array $data=[] , string $message, int $statusCode)
    {
        return response()->json(["status" => $status,
                                    "data" => $data,
                                    "message" => $message],$statusCode);
    }
}

