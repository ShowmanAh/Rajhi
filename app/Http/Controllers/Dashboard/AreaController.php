<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Requests\AreaRequest;
use App\Http\Controllers\Controller;

class AreaController extends Controller
{
    private $view = 'dashboard.areas.';
  public function index(){
      $areas = Area::latest()->paginate(paginate_number);
      return view($this->view.'index', compact('areas'));

  }
  public function create(){
      return view($this->view.'create');
  }
  public function store(AreaRequest $request){

      try {

          $exists = Area::where([['name', $request->name],['city_id', $request->city_id]])->exists();

          if ($exists) {
           return redirect()->back()->with(['error'=>'المنطقه والمدينه مكررين']);
          }
         Area::create($request->all());
         return redirect()->route('admin.areas')->with(['success'=>'تمت الاضافه ']);
      } catch (\Exception $ex) {
        return redirect()->route('admin.areas')->with(['error'=>'حاول مجددا ']);
      }
  }
  public function edit($id){
    //$area = Area::find($id);
    //return $area->city->id;
     try {
        $area = Area::find($id);
        if(!$area){
            return redirect()->route('admin.areas.edit', $id)->with(['error'=>'لايوجد منطقه']);
        }
        return view($this->view.'edit', compact('area'));
     } catch (\Exception $ex) {
        return redirect()->route('admin.areas')->with(['error'=>'حاول مجددا ']);
     }
  }
  public function update(AreaRequest $request, $id){
    try {
        $area = Area::find($id);
        if(!$area){
            return redirect()->route('admin.areas.edit', $id)->with(['error'=>'لايوجد منطقه']);
        }
        $exists = Area::where([['name', $request->name], ['city_id', $request->city_id]])->exists();
        if($exists){
            return redirect()->back()->with(['error'=>'المنطقه والمدينه موجودين من قبل']);
        }
        $area->update($request->all());
        return redirect()->route('admin.areas')->with(['success'=>'تمت التعديل ']);
     } catch (\Exception $ex) {
        return redirect()->route('admin.areas')->with(['error'=>'حاول مجددا ']);
     }
  }
public function destroy($id){
    try {
        $area = Area::find($id);
        if(!$area){
            return redirect()->route('admin.areas')->with(['error'=>'لايوجد منطقه']);
        }
       $area->delete();
       return redirect()->route('admin.areas')->with(['success'=>'تمت الحذف ']);
     } catch (\Exception $ex) {
        return redirect()->route('admin.areas')->with(['error'=>'حاول مجددا ']);
     }
}
}
