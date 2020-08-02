<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Date;
use App\Models\Clinic;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Requests\DateRequest;
use App\Http\Controllers\Controller;

class DateController extends Controller
{
    protected $model;
    protected $view = 'dashboard.dates/.';
    public function __construct(Date $date){
        $this->model =new Repository($date);
    }
    public function index(){
        $dates = $this->model->all();
       // return $dates;
        return view($this->view.'index', compact('dates'));

    }
    public function create(){

        $doctors = Doctor::select('id','name')->get();
        //return $doctors;
        $clinics = Clinic::select('id','name')->get();
        return view($this->view.'create', compact('doctors', 'clinics'));
    }
    public function store(DateRequest $request){
     $request_data = $request->except(['_token']);
    $this->model->create($request_data);
   // return 0;
    return redirect()->route('admin.dates');
    }
    public function edit($id){

        try {
            $doctors = Doctor::select('id','name')->get();
            //return $doctors;
            $clinics = Clinic::select('id','name')->get();
            $date = Date::find($id);
           // return $date;
            if(!$date){
                return redirect()->route('admin.dates');
            }
            return view($this->view.'edit', compact('date', 'doctors', 'clinics'));
        } catch (Exception $ex) {
            return redirect()->route('admin.dates');
        }
    }
  public function update(DateRequest $request, $id){
      try {
        $request_data = $request->except(['_token']);
        $this->model->update($request_data, $id);
        return redirect()->route('admin.dates');
      } catch (Exception $ex) {
         // return $ex;
        return redirect()->route('admin.dates');
      }
  }
  public function destroy($id){
    try {
        $this->model->delete($id);
        return redirect()->route('admin.dates');
    } catch (Exception $ex) {
        // return $ex;
       return redirect()->route('admin.dates');
     }
  }

}
