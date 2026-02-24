<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SubjectService;
use App\Http\Requests\StoreSubjectRequest;


class SubjectController extends Controller
{
    private $service;

    public function __construct(SubjectService $service)
    {
        $this->service = $service;
    }

    public function getSubjects(){
        return $this->service->getSubjects();
    }

    public function store(StoreSubjectRequest $request){
        return $this->service->store($request);
    }

    public function getSubject($id){
        return $this->service->getSubjectById($id);
    }

    public function updateSubject(StoreSubjectRequest $request, $id)
    {
        return $this->service->update($request->validated(),$id);

    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
