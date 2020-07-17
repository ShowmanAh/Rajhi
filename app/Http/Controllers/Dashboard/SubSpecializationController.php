<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Models\Subspecialization;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubspecializationRequest;

class SubSpecializationController extends Controller
{
    private $view = 'dashboard.subspecializations.';
  public function index(){

     //dd($specializations);
   $subspecializations = Subspecialization::latest()->paginate(paginate_number);

   //dd($subspecializations);
   return view($this->view.'index', compact('subspecializations'));
  }
  public function create(){
    try {
        $specializations = Specialization::all();
        return view($this->view.'create', compact('specializations'));
    } catch (\Exception $ex) {
       return redirect()->route('admin.subspecializations')->with(['error' => 'هناك خطا فى البيانات']);
    }
  }
  public function store(SubspecializationRequest $request){
    try {
        Subspecialization::create($request->all());
        return redirect()->route('admin.subspecializations')->with(['success' => 'تمت الاضافه بنجاح']);
    } catch (\Exception $ex) {
        return redirect()->route('admin.subspecializations')->with(['error' => 'هناك خطا فى البيانات']);
    }
  }
  public function edit($id){
    try {
        $specializations = Specialization::all();
        $subspecialization = Subspecialization::find($id);
        if(!$subspecialization){
            return redirect()->route('admin.subspecializations')->with(['error' => 'لايوجد هذا القسم']);
        }
        return view($this->view.'edit', compact('specializations','subspecialization' ));
    } catch (\Exception $ex) {
        return redirect()->route('admin.subspecializations')->with(['error' => 'هناك خطا فى البيانات']);
    }

  }
  public function update(SubspecializationRequest $request, $id){
    try {
       // $specializations = Specialization::all();
        $subspecialization = Subspecialization::find($id);
        if(!$subspecialization){
            return redirect()->route('admin.subspecializations.edit',$id )->with(['error' => 'لايوجد هذا القسم']);
        }
        $subspecialization->update($request->all());
        return redirect()->route('admin.subspecializations')->with(['success' => 'تم تعدبل البيانات بنجاح']);
    } catch (\Exception $ex) {
        return redirect()->route('admin.subspecializations')->with(['error' => 'هناك خطا فى البيانات']);
    }

  }
  public function destroy($id){
    try {

         $subspecialization = Subspecialization::find($id);
         if(!$subspecialization){
             return redirect()->route('admin.subspecializations' )->with(['error' => 'لايوجد هذا القسم']);
         }
         $subspecialization->delete();
         return redirect()->route('admin.subspecializations')->with(['success' => 'تم حذف البيانات بنجاح']);
     } catch (\Exception $ex) {
         return redirect()->route('admin.subspecializations')->with(['error' => 'هناك خطا فى البيانات']);
     }
  }
}
