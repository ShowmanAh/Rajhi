<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\InsuranceCompany;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsuranceCompanyRequest;
use App\Http\Resources\InsuranceCompanyResource;

class InsuranceCompanyController extends Controller
{
    use ApiResponseTrait;

    public function index(){
       $insurance_company = InsuranceCompanyResource::collection(InsuranceCompany::paginate($this->paginate_number));
       if(count($insurance_company) > 0){
           return $this->apiResponse(['insurance_company'=>$insurance_company]);
       }else{
        return $this->notFoundResponse();
       }
    }
    public function show($id){
        try {
            $insurance_company = InsuranceCompany::find($id);
            if(!$insurance_company){
                return $this->notFoundResponse();
            }
            $insurance_company = new InsuranceCompanyResource($insurance_company);
            return $this->apiResponse(['insurance_company'=>$insurance_company]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
    }
    public function store(InsuranceCompanyRequest $request){
        $insurance_company = InsuranceCompany::create($request->all());
        if($insurance_company){
            $insurance_company = new InsuranceCompanyResource($insurance_company);
            return $this->apiResponse(['insurance_company'=>$insurance_company]);
        }

    }
    public function update(InsuranceCompanyRequest $request, $id){
      try {
        $insurance_company = InsuranceCompany::find($id);
        if(!$insurance_company){
            return $this->notFoundResponse();
        }
        $insurance_company->update($request->all());
        $insurance_company = new InsuranceCompanyResource($insurance_company);
        return $this->apiResponse(['insurance_company'=>$insurance_company]);
      } catch (Exception $ex) {
        return $this->unKnownError();
    }

    }
    public function destroy($id){
        try {
            $insurance_company = InsuranceCompany::find($id);
            if(!$insurance_company){
                return $this->notFoundResponse();
            }
            $insurance_company->delete();
            $insurance_company = new InsuranceCompanyResource($insurance_company);
            return $this->apiResponse(['insurance_company'=>$insurance_company]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
    }
}
