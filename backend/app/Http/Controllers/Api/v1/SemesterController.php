<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSemesterRequest;
use App\Services\SemesterService;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    private $service;

    public function __construct(SemesterService $service)
    {
        $this->service = $service;
    }

    public function getSemesters(){
        return $this->service->getSemesters();
    }

    public function store(StoreSemesterRequest $request){
        dd("teste");
        return $this->service->store($request);
    }

    public function getSemester($id){
        return $this->service->getSemesterById($id);
    }

    public function updateSemester(StoreSemesterRequest $request, $id)
    {
        return $this->service->update($request->validated(),$id);

    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
