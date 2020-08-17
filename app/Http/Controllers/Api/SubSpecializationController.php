<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Models\Subspecialization;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubspecializationRequest;
use App\Http\Resources\SubSpecializationResource;

class SubSpecializationController extends Controller
{
    use ApiResponseTrait;

    public function index(){
       $suSpecializations = SubSpecializationResource::collection(Subspecialization::with(['specialization:id,name'])->get());
       if(count($suSpecializations) > 0){
           return $this->apiResponse(['subSpecializations'=>$suSpecializations]);
       }else{
        return $this->notFoundResponse();
       }
    }
    public function show($id){
        try {
            $suSpecialization = Subspecialization::find($id);
            if(!$suSpecialization){
                return $this->notFoundResponse();
            }
            $suSpecialization = new SubSpecializationResource($suSpecialization);
            return $this->apiResponse(['subSpecialization'=>$suSpecialization]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
    }
    public function store(SubspecializationRequest $request){
        $suSpecialization = Subspecialization::create($request->all());
        if($suSpecialization){
            $suSpecialization = new SubSpecializationResource($suSpecialization);
            return $this->apiResponse(['subSpecialization'=>$suSpecialization]);
        }

    }
    public function update(SubspecializationRequest $request, $id){
      try {
        $suSpecialization = Subspecialization::find($id);
        if(!$suSpecialization){
            return $this->notFoundResponse();
        }
        $suSpecialization->update($request->all());
        $suSpecialization = new SubSpecializationResource($suSpecialization);
        return $this->apiResponse(['subSpecialization'=>$suSpecialization]);
      } catch (Exception $ex) {
        return $this->unKnownError();
    }

    }
    public function destroy($id){
        try {
            $suSpecialization = Subspecialization::find($id);
            if(!$suSpecialization){
                return $this->notFoundResponse();
            }
            $suSpecialization->delete();
            $suSpecialization = new SubSpecializationResource($suSpecialization);
            return $this->apiResponse(['subSpecialization'=>$suSpecialization]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
    }
}
