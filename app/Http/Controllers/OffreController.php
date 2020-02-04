<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\SpecialRequest;
use App\Offre;
use Yajra\Datatables\DataTables;

class OffreController extends Controller
{
    public function  index(){
    	
    	return view('admin.offres.index');
    }
    
    

    public function  create(){
    	return view('admin.offres.add');
    }

   public function store(Request $request,Offre $offre) {


   	
   	 $offre->create([
            'codesession' => $request['codesession'],
            'codespecial' => listespecial()[$request['codespecial']],
            'typeoffre' => typeoffre()[$request['typeoffre']],
            

        ]);
   	 return redirect('/adminpanel/offres')->withFlashMessage('تم إضافة العرض بنجاح');
   }

   public function edit($id){
   	$offre=Offre::findOrFail($id);
   	return view('admin.offres.edit',compact('offre'));

   }

   public function update(Request $request,$id){
   	$offre=Offre::findOrFail($id);
   	$offre->fill($request->all()) ->save();
     
   	return back()->withFlashMessage('تم تعديل العرض بنجاح');

   }
   
  
   public function delete($id){

   	$offre=Offre::findOrFail($id);
    
   	$offre->delete();
   	return back()->withFlashMessage('تم حذف العرض بنجاح');
   
   }

   public function anyData(){
     $offres=Offre::all();
     return DataTables::of($offres)
    
     ->editColumn('codespecial',function($model){
      return \Html::Link('/adminpanel/offres/'.$model->id.'/edit',$model->codespecial);
     })

     

     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/offres/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/offres/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}

/*website */

public function liste(){

/*  $actualspecs=Actuelspecial::paginate(12);*/
  return view('website.offres.liste');
}
public function show($id){

  $offre=Offre::findOrFail($id);
  return view('website.offres.show',compact('offre'));
}

}
