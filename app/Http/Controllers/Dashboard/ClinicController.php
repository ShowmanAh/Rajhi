<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Clinic;
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
        //return $clinics;
        return view($this->view.'index', compact('clinics'));
      // return Clinic::selection()->get();
    }
    public function create(){
        return view($this->view.'create');
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
