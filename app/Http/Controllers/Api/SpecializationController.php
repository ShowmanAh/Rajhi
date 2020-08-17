<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Repositories\Repository;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpecializationRequest;
use App\Http\Resources\SpecializationResource;

class SpecializationController extends Controller
{
    use ApiResponseTrait;
    protected $model;
   public function __construct(Specialization $model){
         $this->model = new Repository($model);
   }
   public function index(){
      $specializations = SpecializationResource::collection($this->model->all());
      return $this->apiResponse(['specializations'=>$specializations]);
   }
   public function show($id){

        try {
            $specialization = Specialization::find($id);
            if(!$specialization){
                return $this->notFoundResponse();
            }
            $specialization = new SpecializationResource($specialization);
            return $this->apiResponse(['specialization'=>$specialization]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
   }
   public function store(SpecializationRequest $request){
      $specialization = $this->model->create($request->all());
      if($specialization){
        $specialization = new SpecializationResource($specialization) ;
          return $this->apiResponse(['specialization'=>$specialization]);
      }else{
        return $this->unKnownError();
      }
   }

   public function update(SpecializationRequest $request, $id){
       try {
           $specialization = Specialization::find($id);
           if (!$specialization) {
            return $this->unKnownError();
           }
          $specialization->update($request->all());
          $specialization = new SpecializationResource($specialization) ;
            return $this->apiResponse(['specialization'=>$specialization]);
       } catch (Exception $ex) {
        return $this->unKnownError();
       }

 }
 public function destroy($id){
     try {
         $specialization = Specialization::find($id);
         if(!$specialization){
            return $this->unKnownError();
         }
         $specialization->delete();
         $specialization = new SpecializationResource($specialization);
         return $this->apiResponse(['specilization'=>$specialization]);
     } catch (Exception $ex) {
        return $this->unKnownError();
       }
  }

}
