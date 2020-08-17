<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Center;
use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicRequest;

class ClinicController extends Controller
{
    protected $model;
    protected $view = 'dashboard.clinics/.';
    public function __construct(Clinic $clinic){
        $this->model =new Repository($clinic);
    }
    public function index(){
        $clinics = $this->model->all();
      // return $clinics;
        return view($this->view.'index', compact('clinics'));

    }
    public function create(){
        $centers = Center::select('id','name')->get();
        $cities = City::select('id','name')->get();
        $doctors = Doctor::select('id','name')->get();
        return view($this->view.'create', compact('centers', 'cities', 'doctors'));
    }
    public function store(ClinicRequest $request){
     // return $request;
     $request_data = $request->except(['_token']);
    $this->model->create($request_data);
    return redirect()->route('admin.clinics');
    }
    public function edit($id){
        try {
            $clinic = Clinic::find($id);
            if(!$clinic){
                return redirect()->route('admin.clincks');
            }
            return view($this->view.'edit', compact('clinic'));
        } catch (Exception $ex) {
            return redirect()->route('admin.clincks');
        }
    }
  public function update(ClinicRequest $request, $id){
      try {
        $request_data = $request->except(['_token']);
        $this->model->update($request_data, $id);
        return redirect()->route('admin.clinics');
      } catch (Exception $ex) {
         // return $ex;
        return redirect()->route('admin.clinics');
      }
  }
  public function destroy($id){
    try {
        $this->model->delete($id);
        return redirect()->route('admin.clinics');
    } catch (Exception $ex) {
        // return $ex;
       return redirect()->route('admin.clinics');
     }
  }

}
