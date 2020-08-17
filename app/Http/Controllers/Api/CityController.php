<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;

class CityController extends Controller
{
    use ApiResponseTrait;

    public function index(){
       $city = CityResource::collection(City::paginate($this->paginate_number));
       if(count($city) > 0){
           return $this->apiResponse(['city'=>$city]);
       }else{
        return $this->notFoundResponse();
       }
    }
    public function show($id){
        try {
            $city = City::find($id);
            if(!$city){
                return $this->notFoundResponse();
            }
            $city = new CityResource($city);
            return $this->apiResponse(['city'=>$city]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
    }
    public function store(CityRequest $request){
        $city = City::create($request->all());
        if($city){
            $city = new CityResource($city);
            return $this->apiResponse(['city'=>$city]);
        }

    }
    public function update(CityRequest $request, $id){
      try {
        $city = City::find($id);
        if(!$city){
            return $this->notFoundResponse();
        }
        $city->update($request->all());
        $city = new CityResource($city);
        return $this->apiResponse(['city'=>$city]);
      } catch (Exception $ex) {
        return $this->unKnownError();
    }

    }
    public function destroy($id){
        try {
            $city = City::find($id);
            if(!$city){
                return $this->notFoundResponse();
            }
            $city->delete();
            $city = new CityResource ($city);
            return $this->apiResponse(['city'=>$city]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
    }
}
