<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\InsuranceCompany;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsuranceCompanyRequest;

class InsuranceCompanyController extends Controller
{
    private $view = 'dashboard.insurance.';
    public function index(){
      $insurances = InsuranceCompany::paginate(paginate_number);
      //dd($specializations);
      return view($this->view . 'index', compact('insurances'));
    }
    public function create(){
        return view($this->view . 'create');
    }
    public function store(InsuranceCompanyRequest $request){
        //dd($request->all());
        try {
             InsuranceCompany::create($request->except(['_token']));

            return redirect()->route('admin.insurance')->with(['success'=> 'تم الحفظ بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.insurance')->with(['error'=> 'هناك خطا فى البيانات']);
        }
     }
    public function edit($id){
        $insurance = InsuranceCompany::find($id);
        if(!$insurance){
            return redirect()->route('admin.insurance')->with(['error' => 'لايوجد هذا التخصص']);
        }
        return view($this->view . 'edit', compact('insurance'));
    }
    public function update(InsuranceCompanyRequest $request, $id){
    try {
        $insurance = InsuranceCompany::find($id);
        if(!$insurance){
            return redirect()->route('admin.insurance.edit', $id)->with(['error' => 'لايوجد هذا التخصص']);
        }
        $insurance->update($request->except(['_token']));
        return redirect()->route('admin.insurance')->with(['success'=> 'تم التعديل بنجاح']);
    } catch (\Exception $ex) {
        return redirect()->route('admin.insurance')->with(['error'=> 'هناك خطا فى البيانات']);
    }
    }
    public function destroy($id){
        try {
            $insurance = InsuranceCompany::find($id);
            if(!$insurance){
                return redirect()->route('admin.insurance')->with(['error' => 'لايوجد هذا التخصص']);
            }
           $insurance->delete();
            return redirect()->route('admin.insurance')->with(['success'=> 'تم الحذف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.insurance')->with(['error'=> 'هناك خطا فى البيانات']);
        }
    }
}
