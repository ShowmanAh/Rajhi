<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Models\Date;
use Illuminate\Http\Request;
use App\Http\Requests\DateRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\DateResource;

class DateController extends Controller
{
    use ApiResponseTrait;

    public function index(){
       $dates = DateResource::collection(Date::with(['doctors:id,name','clinics:id,name'])->paginate($this->paginate_number));
       if(count($dates) > 0){
           return $this->apiResponse(['dates'=>$dates]);
       }else{
        return $this->notFoundResponse();
       }
    }
    public function show($id){
        try {
            $date = Date::find($id);
            if(!$date){
                return $this->notFoundResponse();
            }
            $date = new DateResource($date);
            return $this->apiResponse(['date'=>$date]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
    }
    public function store(DateRequest $request){

            try {
                if(count($request->from != count($request->to))){
                    return response()->json('error ocured');
                }
                DB::begintransaction();
                $date = Date::create($request->all());

                if($date){
                    for ($i=0; $i < count($request->from); $i++) {
                        $date->times()->create([
                           'from' =>$request->from[$i],
                           'to' => $request->to[$i],
                        ]);
                     }
                    $date = new DateResource($date);
                    return $this->apiResponse(['date'=>$date]);


            }
            DB::commit();
            }  catch (Exception $ex) {
                DB::rollback();
               return $this->unKnownError();
            }
    }

    public function update(DateRequest $request, $id){
      try {
        $date = Date::find($id);
        if(count($request->from != count($request->to))){
            return response()->json('error ocured');
        }
        if(!$date){
            return $this->notFoundResponse();
        }
        DB::begintransaction();
        $date->update($request->all());
        $date->times()->delete();
        for ($i=0; $i < count($request->from); $i++) {
            $date->times()->create([
               'from' =>$request->from[$i],
               'to' => $request->to[$i],
            ]);
         }
        $date = new DateResource($date);
        DB::commit();
        return $this->apiResponse(['date'=>$date]);

      } catch (Exception $ex) {
        return $this->unKnownError();
    }

    }
    public function destroy($id){
        try {
            $date = Date::find($id);
            if(!$date){
                return $this->notFoundResponse();
            }
            $date->times()->delete();
            $date->delete();
            $date = new DateResource ($date);
            return $this->apiResponse(['date'=>$date]);
        } catch (Exception $ex) {
            return $this->unKnownError();
        }
    }
}
