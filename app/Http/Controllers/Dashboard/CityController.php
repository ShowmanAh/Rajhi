<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    private $view = 'dashboard.cities.';
   public function index(){
    $cities = City::select('id', 'name')->paginate(paginate_number);
    return view($this->view.'index', compact('cities'));
   }

   public function create(){
       return view($this->view.'create');
   }
   public function store(Request $request){
       try {
           $data = $request->validate([
            'name' => 'required|unique:cities',
          ]);
           City::create($data);
           return redirect()->route('admin.cities')->with(['success'=>'تم اضافه المدينه بنجاح']);
       } catch (\Excetion $ex) {
           return redirect()->route('admin.cities.create')->with(['errors'=>'يرجى المحاوله مجددا']);
       }
   }
   public function edit($id){
       $city = City::find($id);
       if(!$city){
           return redirect()->route('admin.cities.edit', $id)->with(['errors'=>'لايوجد']);
       }
       return view($this->view.'edit', compact('city'));
   }
   public function update(Request $request, $id){
       try {
        $data = $request->validate([
            'name' => 'required|unique:cities',
          ]);
        $city = City::find($id);
        if(!$city){
            return redirect()->route('admin.cities.edit', $id)->with(['errors'=>'لايوجد']);
        }
        $city->update($data);
        return redirect()->route('admin.cities')->with(['success'=>'تم التعديل المدينه بنجاح']);
       } catch (\Excetion $ex) {
        return redirect()->route('admin.cities')->with(['errors'=>'يرجى المحاوله مجددا']);
       }
   }
   public function destroy($id){
    try {
        $city = City::find($id);
        if(!$city){
            return redirect()->route('admin.cities')->with(['errors'=>'لايوجد']);
        }
        $city->delete();
        return redirect()->route('admin.cities')->with(['success'=>'تم  الحذف بنجاح']);
       } catch (\Excetion $ex) {
        return redirect()->route('admin.cities')->with(['errors'=>'يرجى المحاوله مجددا']);
       }
   }
}
