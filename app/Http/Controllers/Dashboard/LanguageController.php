<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LanguageRequest;

class LanguageController extends Controller
{
    private $view = 'dashboard.languages.';
   public function index(){
       // $languages = Language::selection()->first();
   $languages = Language::select()->paginate(paginate_number);
   return view($this->view . 'index', compact('languages'));
   }
   public function create(){
       return view($this->view . 'create');
   }
   public function store(LanguageRequest $request){
    try {
        Language::create($request->except(['_token']));
    session()->flash('success', __('تم اضافه اللغه بنجاح'));
    return redirect()->route('admin.languages');
    } catch (\Exception $ex) {
        return redirect()->route('admin.languages')->with(['errors'=>'هناك خطا ما']);
    }
   }
   public function edit($id){
       $lang = Language::select()->find($id);
       if(!$lang){
           return redirect()->route('admin.languages.edit', $id)->with(['error'=>'اللغه غير موجوده']);
       }
       return view($this->view . 'edit', compact('lang'));
   }
   public function update(LanguageRequest $request, $id){
       try {
        $lang = Language::find($id);
        if(!$lang){
            return redirect()->route('admin.languages.edit', $id)->with(['error'=>'اللغه غير موجوده']);
        }
        // check active request
        if (!$request->has('active')) {
           $request->request->add(['active'=> 0]);
        }
        $lang->update($request->except(['_token']));
        return redirect()->route('admin.languages')->with(['success'=>'تم تعديل اللغه بنجاح']);

       } catch (\Exception $ex) {
           return redirect()->route('admin.languages')->with(['error'=>'هناك خطا ما']);
       }
    }

    public function destroy($id){
       try {
        $lang = Language::find($id);
        if(!$lang){
            return redirect()->route('admin.languages')->with(['error'=>'اللغه غير موجوده']);
        }
          $lang->delete();
          return redirect()->route('admin.languages')->with(['error'=>'تم الحذف بنجاح']);
       } catch (\Exception $ex) {
        return redirect()->route('admin.languages')->with(['error'=>'هناك خطا ما اعد المحاوله مجددا']);
       }
    }

}
