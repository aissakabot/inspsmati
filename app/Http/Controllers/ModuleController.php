<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use Yajra\Datatables\DataTables;

class ModuleController extends Controller
{
	public function  index(){
    	
    	return view('admin.modules.index');
    }
    
    

    public function  create(){
    	return view('admin.modules.add');
    }

   public function store(Request $request,Module $module) {


   	
   	 $module->create([
            
            
            'libelle' => $request['libelle'],
            'special_id' => $request['special_id'],
           
          
        ]);
   	 return redirect('/adminpanel/modules')->withFlashMessage('تمت إضافة معلوات الامقاييس  بنجاح');
   }

   public function edit($id){
   	$module=Module::findOrFail($id);
   	return view('admin.modules.edit',compact('module'));

   }

   public function update(Request $request,$id){
   	$module=Module::findOrFail($id);
   	$module->fill($request->all())->save();
   
   	      
   	return back()->withFlashMessage('نم تعديل معلوات الامقاييس  بنجاح');

   }
   
  
   public function delete($id){

   	$module=Module::findOrFail($id);
    
   	$module->delete();
   	return back()->withFlashMessage('تم حذف معلوات الامقاييس بنجاح');
   
   }

   public function anyData(){
     $modules=Module::all();
     return DataTables::of($modules)
    
     ->editColumn('libelle',function($model){
      return \Html::Link('/adminpanel/modules/'.$model->id.'/edit',$model->libelle);
     })
    ->editColumn('special_id',function($model){
      return listespecial()[$model->special_id];
     })
     

     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/modules/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/modules/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}

}
