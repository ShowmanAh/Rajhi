<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServicesRequest;

class ServicesController extends Controller
{
    private $view = 'dashboard.services.';
    public function index(){
      $services = Service::paginate(paginate_number);
      //dd($specializations);
      return view($this->view . 'index', compact('services'));
    }
    public function create(){
        return view($this->view . 'create');
    }
    public function store(ServicesRequest $request){
        //dd($request->all());
        try {
             Service::create($request->except(['_token']));

            return redirect()->route('admin.services')->with(['success'=> 'تم الحفظ بنجاح']);

        } catch (\Exception $ex) {
            return redirect()->route('admin.services')->with(['error'=> 'هناك خطا فى البيانات']);
        }
     }
    public function edit($id){
        $service = Service::find($id);
        if(!$service){
            return redirect()->route('admin.services')->with(['error' => 'لايوجد هذا التخصص']);
        }
        return view($this->view . 'edit', compact('service'));
    }
    public function update(ServicesRequest $request, $id){
    try {
        $service = Service::find($id);
        if(!$service){
            return redirect()->route('admin.services.edit', $id)->with(['error' => 'لايوجد هذا التخصص']);
        }
        $service->update($request->except(['_token']));
        return redirect()->route('admin.services')->with(['success'=> 'تم التعديل بنجاح']);
    } catch (\Exception $ex) {
        return redirect()->route('admin.services')->with(['error'=> 'هناك خطا فى البيانات']);
    }
    }
    public function destroy($id){
        try {
            $service = Service::find($id);
            if(!$service){
                return redirect()->route('admin.services')->with(['error' => 'لايوجد هذا التخصص']);
            }
           $service->delete();
            return redirect()->route('admin.services')->with(['success'=> 'تم الحذف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('admin.services')->with(['error'=> 'هناك خطا فى البيانات']);
        }
    }
}
