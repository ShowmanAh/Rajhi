<?php

namespace App\Http\Controllers\Dashboard;

use DB;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\InsuranceCompany;
use App\Models\Subspecialization;
use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorRequest;
use Symfony\Component\Console\Input\Input;

class DoctorController extends Controller
{
    private $view = 'dashboard.doctors.';
   public function index(){
    $doctors = Doctor::select('id','name','image','gender','specialization_id','title')->paginate(paginate_number);
     return view($this->view.'index', compact('doctors'));
   }
public function create(){
   // $specializations = Specialization::all()->pluck('name', 'id');

    $specializations = Specialization::select('id','name')->get();
    $insurance_companies = InsuranceCompany::select('id', 'name')->get();

     return view($this->view.'createe', compact('specializations', 'insurance_companies'));
}
public function store(DoctorRequest $request){
   // dd('hh');
  //  return $request;
  //return 0;
    try {
       dd($request->all());
    $filepath = "";
    $request_data = $request->except(['password','image','services','insurance_companies', 'subspecializations']);
    $request_data['password']= bcrypt($request->password);

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
   return redirect()->route('admin.doctors')->with(['success'=> 'تم الاضافه بنجاح']);
    } catch (\Exception $ex) {
        return $ex;
        DB::rollback();
        return redirect()->route('admin.doctors')->with(['error'=> 'اعد المحاوله مجددا  ']);
    }
}

public function show($id){
   // $doctor = Doctor::find($id);
   //$d =  $doctor->services;
    //dd($d);
    try {
        $doctor = Doctor::find($id);
        if(!$doctor){
            return redirect()->route('admin.doctors')->with(['error'=> 'لا يوجد  ']);
        }
       return view($this->view.'show', compact('doctor'));
    } catch (\Exception $ex) {
        return redirect()->route('admin.doctors')->with(['error'=> 'اareaarearea
        عد المحاوله مجددا  ']);
    }
}

public function edit($id){


    try {
        $doctor = Doctor::find($id);
        if(!$doctor){
            return redirect()->route('admin.doctors')->with(['error'=> 'لا يوجد  ']);
        }
        return view($this->view.'edit', compact('doctor'));
    } catch (\Exception $ex) {
        return redirect()->route('admin.doctors')->with(['error'=> 'اعد المحاوله مجددا  ']);
    }


}
public function update(DoctorRequest $request, $id){
   // dd(($request->all()));
    try {
        $doctor = Doctor::find($id);
        //dd($request->all());
     $filepath = "";
     $request_data = $request->except(['password','image','services','insurance_companies', 'subspecializations']);
     $request_data['password']= bcrypt($request->password);

    if ($request->has('image')) {
       $filepath = uploadImage('doctorimages', $request->image);
    }
    $request_data['image'] = $filepath;
    DB::begintransaction();
    //$doctor =  Doctor::create($request_data);
    $doctor->update($request_data);
    $doctor->services()->delete();
    if($request->has('services')){
        $services = explode(',', $request->services);
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
    return redirect()->route('admin.doctors')->with(['success'=> 'تم التعديل بنجاح']);
     } catch (\Exception $ex) {
         DB::rollback();
         return redirect()->route('admin.doctors')->with(['error'=> 'اعد المحاوله مجددا  ']);
     }
}

public function destroy($id){
    try {
        $doctor = Doctor::find($id);
        if(!$doctor){
            return redirect()->route('admin.doctors')->with(['error'=>'not found']);
        }
        $doctor->services()->delete();
        $doctor->insurance_companies()->detach();
        $doctor->subspecializations()->detach();
        $doctor->delete();
        return redirect()->route('admin.doctors')->with(['success'=> 'تم الحذف بنجاح']);
    } catch (\Exception $ex) {
        return redirect()->route('admin.doctors')->with(['error'=> 'اعد المحاوله مجددا  ']);
    }
}


public function getSubspecializations(Request $request)
{

    if ($request->has('specialization')) {
        $specialization = Specialization::find($request->specialization);

        if ($specialization) {
            return responseJson(1, 'success', $specialization->subspecializations);
        } else {
            return responseJson(0, 'Error occured !');
        }
    }
}
public function getSub($id){
    $sub = Subspecialization::where('specialization_id', $id)->pluck('name', 'id');
   // return $sub;
  // return json_encode($sub);
  return responseJson(1, 'success', $sub);
}


}
