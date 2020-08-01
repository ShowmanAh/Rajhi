<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Area;
use App\Models\City;
use App\Models\Center;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CenterRequest;

class CentersController extends Controller
{
    private $view = 'dashboard.centers.';
    public function index(){
       $centers = Center::with('city', 'areas')->paginate(paginate_number);
      // dd($centers);
       return view($this->view.'index', compact('centers'));
    }
    public function create(){
        $cities = City::select('id', 'name')->get();
        $areas = Area::select('id','name')->get();
       // dd($cities);
       return view($this->view.'create', compact('cities','areas'));

    }
    public function store(CenterRequest $request) {
    // return $request;
     try {
         $filepath = '';
         $request_data = $request->except(['password','logo']);
         if($request->has('password')){
             $request_data['password'] = bcrypt($request->password);
         }
         if($request->has('logo')){
          $filepath = uploadImage('centerImages', $request->logo);
         }
         $request_data['logo'] = $filepath;
         Center::create($request_data);
         return redirect()->route('admin.centers')->with(['success'=>'تمت الاضافه']);
     } catch (\Exception $ex) {
       return redirct()->route('admin.centers')->with(['error'=>'حدث خطأ']);
     }
    }
    public function show($id){
        try {
            $center = Center::find($id);
            $cities = City::select('id','name')->get();
            $areas = Area::select('id','name')->get();
            if(!$center){
                return redirect()->route('admin.centers')->with(['error'=>'لايوجد هذا المركز']);
            }
            return view($this->view.'show', compact('center', 'cities', 'areas'));
        } catch (\Exception $ex) {
            return redirct()->route('admin.centers')->with(['error'=>'حدث خطأ']);
        }
    }
    public function edit($id){
        try {
            $center = Center::find($id);
            $cities = City::select('id','name')->get();
            $areas = Area::select('id','name')->get();
            if(!$center){
                return redirect()->route('admin.centers')->with(['error'=>'لايوجد هذا المركز']);
            }
            return view($this->view.'edit', compact('center','cities', 'areas'));
        } catch (\Exception $ex) {
            return redirct()->route('admin.centers')->with(['error'=>'حدث خطأ']);
        }
    }
    public function update($id, CenterRequest $request){
       // return $request;
        try {
            $center = Center::find($id);
            if(!$center){
                return redirect()->route('admin.centers')->with(['error'=>'لايوجد هذا المركز']);
            }
            $filepath = '';
         $request_data = $request->except(['password','logo']);
         if($request->has('password')){
             $request_data['password'] = bcrypt($request->password);
         }
         if($request->has('logo')){
          $filepath = uploadImage('centerImages', $request->logo);
         }
         $request_data['logo'] = $filepath;
         $center->update($request_data);
         return redirect()->route('admin.centers')->with(['success'=>'تمت التعديل']);
        } catch (\Exception $ex) {
          return redirct()->route('admin.centers')->with(['error'=>'حدث خطأ']);
        }
    }
    public function destroy($id){
        try {
            $center = Center::find($id);
            if(!$center){
                return redirect()->route('admin.centers')->with(['error'=>'لايوجد هذا المركز']);
            }
            $center->delete();
            return redirect()->route('admin.centers')->with(['success'=>' تم الحذف ']);
        } catch (\Exception $ex) {
            return redirct()->route('admin.centers')->with(['error'=>'حدث خطأ']);
        }
    }
}
