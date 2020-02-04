<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addSessionRequest;
use App\Ses;
use Yajra\Datatables\DataTables;

class SesController extends Controller
{
    public function  index(){
    	
    	return view('admin.sessions.index');
    }
    
    

    public function  create(){
    	return view('admin.sessions.add');
    }

   public function store(addSessionRequest $request,Ses $ses) {


   	
   	 $ses->create([
            'libelle' => $request['libelle'],
            'datedebut' => $request['datedebut'],
            

        ]);
   	 return redirect('/adminpanel/sessions')->withFlashMessage('تمت إضافة الدورة بنجاح');
   }

   public function edit($id){
   	$ses=Ses::findOrFail($id);
   	return view('admin.sessions.edit',compact('ses'));

   }

   public function update(Request $request,$id){
   	$ses=Ses::findOrFail($id);
   	$ses->fill($request->all())->save();
   	return back()->withFlashMessage('تم تعديل الدورة بنجاح');

   }
   
  
   public function delete($id){

   	$ses=Ses::findOrFail($id);
    
   	$ses->delete();
   	return back()->withFlashMessage('تم حذف الدورة بنجاح');
   
   }

   public function anyData(){
     $ses=Ses::all();
     return DataTables::of($ses)
    
     ->editColumn('libelle',function($model){
      return \Html::Link('/adminpanel/sessions/'.$model->id.'/edit',$model->libelle);
     })

     

     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/sessions/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/sessions/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}
}
