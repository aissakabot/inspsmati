<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use Yajra\Datatables\DataTables;

class ContactController extends Controller
{
   
    public function add(){
    	return view('website.contact.contact');
    }

    public function store(Request $request, Contact $cont){
    	
    	$cont->create([

    	'name'=>$request['name'],
    	'email'=>$request['email'],
    	'subject'=>$request['subject'],
    	'message'=>$request['message'],
    	'typemess'=>$request['typemess'],

    	]);
    	return back()->withFlashMessage('تم إرسال الرسالة بنجاح');
    	    }


public function edit($id){
   	$cont=Contact::findOrFail($id);
   	$cont->view=1;
   	$cont->save();
   	return view('admin.contact.edit',compact('cont'));

   }
   

   public function update(Request $request,$id){
   	$cont=Contact::findOrFail($id);
   	$cont->fill($request->all())->save();
   	return back()->withFlashMessage('نم تعديل النشاط بنجاح');

   }


   public function delete($id){

   	$Cont=Contact::findOrFail($id);
  
   	$Cont->delete();
   	return back()->withFlashMessage('تم حذف النشاط بنجاح');
   }


public function index(){
    	return view('admin.contact.index');
    }

public function anyData(){
     $conts=Contact::all();
     return DataTables::of($conts)
    
     ->editColumn('name',function($model){
      return \Html::Link('/adminpanel/contacts/'.$model->id.'/edit',$model->name);
     })

     ->editColumn('view',function($model){
      return $model->view == 1 ? '<span class="badge badge-info">قديمة</span>' : '<span class="badge badge-warning">حديثة</span>';
    
     })
     ->editColumn('typemess',function($model){
      return   '<span class="badge badge-info">'.contact()[$model->typemess].'</span>' ;
    
     })
     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/contacts/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
     
      $all .='<a href="'.url('/adminpanel/contacts/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}


}
