<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\Resultat;
use App\Http\Requests\addResultRequest;
use validator;
use Yajra\Datatables\DataTables;
class ResultatController extends Controller
{
    //
    public function  index(){
    	
    	return view('admin.resultats.index');
    }

    public function addimport(){
    	return view('admin.resultats.add');
    }

    public function saveimport(addResultRequest $request){


   
    	if ($request->hasFile('res')){
 

    		$path=$request->file('res')->getRealPath();
    		$data=Excel::load($path,function($reader){})->get();
    		if(!empty($data) && count($data)){
    			foreach($data as $key=>$value){
                 $note=new Resultat();
                 $note->numinscrit=$value->numinscrit;
                $note->nom=$value->nom; 
                $note->prenom=$value->prenom;
                 $note->soum=$value->soum;
                 
                 $note->specialite=$value->specialite;
                 $note->moy_sun=$value->moy_sun;
                 $note->save();
    			}
    			return back()->withFlashMessage('تم تصدير البيانت بنجاح');
    		}
    	}
    	
    }



   public function edit($id){
   	$result=Resultat::findOrFail($id);
   	return view('admin.resultats.edit',compact('result'));

   }

   public function update(Request $request,$id){
   	$result=Resultat::findOrFail($id);

   	$result->fill($request->all())->save();
   	$result->specialite=$request->specialite;
   	$result->save();
   	//$result->fill(['specialite'=>$request->specialite])->save();
   	return back()->withFlashMessage('تم تعديل التسجيل بنجاح');

   }
   
  
   public function delete($id){

   	$result=Resultat::findOrFail($id);
    
   	$result->delete();
   	return back()->withFlashMessage('تم حذف التسجيل بنجاح');
   
   }

    public function anyData(){
     $results=Resultat::all();

     return DataTables::of($results)
    
     ->editColumn('numinscrit',function($model){
      return \Html::Link('/adminpanel/results/'.$model->id.'/edit',$model->numinscrit);
     })

     

     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/results/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/results/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}
}
