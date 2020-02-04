<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addModulSpecRequest;
use App\Modulespecial;
use Yajra\Datatables\DataTables;

class ModulespecialController extends Controller
{
    public function  index(){
    	
    	return view('admin.modulespecialites.index');
    }
    
    

    public function  create(){
    	return view('admin.modulespecialites.add');
    }

   public function store(addModulSpecRequest $request,Modulespecial $modulespecial) {


   	
   	 $modulespecial->create([
            'special' => listespecial()[$request['special']],
            'soum_id' => $request['soum_id'],
            'module' => $request['module'],
            'volh' => $request['volh'],
            'coef' => $request['coef'],
            'noteelimin' => $request['noteelimin'],
            

        ]);
   	 return redirect('/adminpanel/modulespecialites')->withFlashMessage('تمت إضافة معلوات الامقاييس والأحجام الساعية في السداسيات بنجاح');
   }

   public function edit($id){
   	$modulespecial=Modulespecial::findOrFail($id);
   	return view('admin.modulespecialites.edit',compact('modulespecial'));

   }

   public function update(Request $request,$id){
   	$modulespecial=Modulespecial::findOrFail($id);
   	$modulespecial->fill($request->all())->save();
   		$modulespecial->fill(['special' => listespecial()[$request['special']]])->save();
   
   	
   	      
   	return back()->withFlashMessage('نم تعديل معلوات الامقاييس والأحجام الساعية في السداسيات بنجاح');

   }
   
  
   public function delete($id){

   	$modulespecial=Modulespecial::findOrFail($id);
    
   	$modulespecial->delete();
   	return back()->withFlashMessage('تم حذف معلوات الامقاييس والأحجام الساعية في السداسيات بنجاح');
   
   }

   public function anyData(){
     $modulespec=Modulespecial::all();
     return DataTables::of($modulespec)
    
     ->editColumn('special',function($model){
      return \Html::Link('/adminpanel/modulespecialites/'.$model->id.'/edit',$model->special);
     })


     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/modulespecialites/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/modulespecialites/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}
}
