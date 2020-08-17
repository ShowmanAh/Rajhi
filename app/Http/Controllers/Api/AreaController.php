<?php

namespace App\Http\Controllers\Api;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\AreaResource;

class AreaController extends Controller
{
    use ApiResponseTrait;

    public function index(){
       $area = AreaResource::collection(Area::with(['city:id,name'])->paginate($this->paginate_number));
       if(count($area) > 0){
           return $this->apiResponse(['area'=>$area]);
       }else{
        return $this->notFoundResponse();
       }
    }
    public function show($id){
        try {
            $area = Area::find($id);
            if(!$area){
                return $this->notFoundResponse();
            }
            $area = new AreaResource($area);
            return $this->apiResponse(['area'=>$area]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
    }
    public function store(AreaRequest $request){
        $area = Area::create($request->all());
        if($area){
            $city = new AreaResource($area);
            return $this->apiResponse(['area'=>$area]);
        }

    }
    public function update(AreaRequest $request, $id){
      try {
        $area = Area::find($id);
        if(!$area){
            return $this->notFoundResponse();
        }
        $area->update($request->all());
        $area = new AreaResource($area);
        return $this->apiResponse(['area'=>$area]);
      } catch (Exception $ex) {
        return $this->unKnownError();
    }

    }
    public function destroy($id){
        try {
            $area = Area::find($id);
            if(!$area){
                return $this->notFoundResponse();
            }
            $area->delete();
            $area = new AreaResource ($area);
            return $this->apiResponse(['area'=>$area]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
    }
}
