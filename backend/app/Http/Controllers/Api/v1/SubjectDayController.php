<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubjectDaysRequest;
use App\Services\SubjectDayService;


class SubjectDayController extends Controller
{
    private $service;

    public function __construct(SubjectDayService $service)
    {
        $this->service = $service;
    }

    public function getSubjectDays(){
        return $this->service->getSubjectDays();
    }

    public function store(StoreSubjectDaysRequest $request){
        return $this->service->store($request);
    }

    public function getSubject($id){
        return $this->service->getSubjectDayById($id);
    }

    public function updateSubject(StoreSubjectDaysRequest $request, $id)
    {
        return $this->service->update($request->validated(),$id);

    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
