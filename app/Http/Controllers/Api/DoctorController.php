<?php

namespace App\Http\Controllers\Api;
use DB;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use App\Http\Resources\DoctorResource;

class DoctorController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $doctors = DoctorResource::collection(Doctor::with(['specialization:id,name']) ->paginate($this->paginate_number));
        if(count($doctors) > 0){
            return $this->apiResponse(['doctors'=>$doctors]);
        }
    }
    public function show($id){
        $doctor = Doctor::find($id);
        if(!$doctor){
            return $this->notFoundResponse();
        }
        $doctor = new DoctorResource($doctor);
        return $this->apiResponse(['doctor'=>$doctor]);
    }
    public function store(DoctorRequest $request){
     try {
        $filepath = "";
        $request_data = $request->except(['password','image','services','insurance_companies', 'subspecializations']);
        if($request->has('password')){
            $request_data['password'] = bcrypt($request->password);
        }
        if ($request->has('image')) {
            $filepath = uploadImage('doctorimages', $request->image);
         }
         $request_data['image'] = $filepath;
         DB::begintransaction();
         $doctor =  Doctor::create($request_data);
         if($request->has('services')){
             $services = explode(',',$request->services);
            // dd($services);
             foreach ($services as $service) {
                 $doctor->services()->create(['name'=>$service]);
             }
         }
         if ($request->has('insurance_companies')) {
             $doctor->insurance_companies()->attach($request->insurance_companies);

         }
         if($request->has('subspecialization')){
             $doctor->subspecializations()->attach($request->subspecializations);
         }

         DB::commit();
         if($doctor){
             $doctor = new DoctorResource($doctor);
             return $this->apiResponse(['doctor'=>$doctor]);
         }
     } catch (\Exception $ex) {
        // return $ex;
         DB::rollback();
        return $this->unKnownError();
     }
    }
    public function update(DoctorRequest $request, $id){
        try {
            $doctor = Doctor::find($id);
            if(!$doctor){
                return $this->notFoundResponse();
            }
           $filepath = "";
           $request_data = $request->except(['password','image','services','insurance_companies', 'subspecializations']);
           if($request->has('password')){
               $request_data['password'] = bcrypt($request->password);
           }
           if ($request->has('image')) {
               $filepath = uploadImage('doctorimages', $request->image);
            }
            $request_data['image'] = $filepath;
            DB::begintransaction();
            $doctor->update($request_data);
            $doctor->services()->delete();
            if($request->has('services')){
                $services = explode(',',$request->services);
               // dd($services);
                foreach ($services as $service) {
                    $doctor->services()->create(['name'=>$service]);
                }
            }
            if ($request->has('insurance_companies')) {
                $doctor->insurance_companies()->sync($request->insurance_companies);

            }
            if($request->has('subspecialization')){
                $doctor->subspecializations()->sync($request->subspecializations);
            }

            DB::commit();
            if($doctor){
                $doctor = new DoctorResource($doctor);
                return $this->apiResponse(['doctor'=>$doctor]);
            }
        } catch (Exception $ex) {
           // return $ex;
            DB::rollback();
           return $this->unKnownError();
        }
       }
       public function destroy($id){
             try {
                $doctor = Doctor::find($id);
                if(!$doctor){
                  return $this->notFoundResponse();
                }
                $doctor->service()->delete();
                $doctor->insurance_companies()->detach();
                $doctor->subspecializations()->detach();
                $doctor->delete();
                $doctor = new DoctorResource($doctor);
                  return $this->apiResponse(['doctor'=>$doctor]);
             } catch (\Exception $ex) {

                return $this->unKnownError();
             }
       }
}
