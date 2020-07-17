<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpecializationRequest;

class SpecializationController extends Controller
{
private $view = 'dashboard.specialization.';
public function index(){
  $specializations = Specialization::paginate(paginate_number);
  //dd($specializations);
  return view($this->view . 'index', compact('specializations'));
}
public function create(){
    return view($this->view . 'create');
}
public function store(SpecializationRequest $request){
    try {
        Specialization::create($request->except(['_token']));
        return redirect()->route('admin.specializations')->with(['success'=> 'تم الحفظ بنجاح']);

    } catch (\Exception $ex) {
        return redirect()->route('admin.specializations')->with(['error'=> 'هناك خطا فى البيانات']);
    }
 }
public function edit($id){
    $special = Specialization::find($id);
    if(!$special){
        return redirect()->route('admin.specializations')->with(['error' => 'لايوجد هذا التخصص']);
    }
    return view($this->view . 'edit', compact('special'));
}
public function update(SpecializationRequest $request, $id){
try {
    $special = Specialization::find($id);
    if(!$special){
        return redirect()->route('admin.specializations.edit', $id)->with(['error' => 'لايوجد هذا التخصص']);
    }
    $special->update($request->except(['_token']));
    return redirect()->route('admin.specializations')->with(['success'=> 'تم التعديل بنجاح']);
} catch (\Exception $ex) {
    return redirect()->route('admin.specializations')->with(['error'=> 'هناك خطا فى البيانات']);
}
}
public function destroy($id){
    try {
        $special = Specialization::find($id);
        if(!$special){
            return redirect()->route('admin.specializations')->with(['error' => 'لايوجد هذا التخصص']);
        }
       $special->delete();
        return redirect()->route('admin.specializations')->with(['success'=> 'تم الحذف بنجاح']);
    } catch (\Exception $ex) {
        return redirect()->route('admin.specializations')->with(['error'=> 'هناك خطا فى البيانات']);
    }
}
}
