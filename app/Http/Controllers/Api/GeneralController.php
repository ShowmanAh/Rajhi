<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use App\Models\City;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\InsuranceCompany;
use App\Models\Subspecialization;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Api\ApiResponseTrait;

class GeneralController extends Controller
{
    use ApiResponseTrait;
    public function specialization(){
        $specializations = Specialization::select('id','name')->get();
        return $this->apiResponse($specializations);
    }
    public function show($id){
        $specialization = Specialization::find($id);
        if(!$specialization){
            return $this->notFoundResponse();
        }
        return $this->apiResponse($specialization);
    }
    public function subspecialization(){
        $sub = Subspecialization::select('id','name')->get();
        return $this->apiResponse($sub);
    }
    public function getsubspecialization($id){
      $sub = Subspecialization:: where('specialization_id', $id)->select('id','name')->get();
      return $this->apiResponse($sub);
    }
    public function insuranceCompany(){
        $insurance = InsuranceCompany::select('id','name')->get();
        return $this->apiResponse($insurance);
    }
    public function cities(){
        $cities = City::select('id','name')->get();
        return $this->apiResponse($cities);
    }
    public function areas($id){
        $areas = Area::where('city_id', $id)->select('id','name')->get();
        return $this->apiResponse($areas);
    }
    public function specialization_with_sub(){
        $specialization = Specialization::with('subspecializations')->get();
        return $this->apiResponse($specialization);
    }
    public function city_with_areas(){
        $city = City::with('areas')->get();
        return $this->apiResponse($city);
    }
}
