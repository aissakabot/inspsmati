<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addSpecialiteRequest;
use App\Specialite;
use Yajra\Datatables\DataTables;

class SpecialiteController extends Controller
{
      public function  index(){
    	
    	return view('admin.specialites.index');
    }
    
    

    public function  create(){
    	return view('admin.specialites.add');
    }

   public function store(addSpecialiteRequest $request,Specialite $special) {


   	
   	 $special->create([
            'code' => $request['code'],
            'intitule' => intitulespecialite()[$request['intitule']],
            'type' => $request['type'],
            'branchep' => $request['branchep'],
            'niveauqual' => $request['niveauqual'],
            'duree' => dureeform()[$request['duree']],
            'volumeh' => volumeh()[$request['volumeh']],
            'diplome' => diplome()[$request['diplome']] ,
            'conditionacc' => conditionacc()[$request['conditionacc'] ],
            'modepriv' => $request['modep'],

        ]);
   	 return redirect('/adminpanel/specialites')->withFlashMessage('تمت إضافة التخصص بنجاح');
   }

   public function edit($id){
   	$specialite=Specialite::findOrFail($id);
   	return view('admin.specialites.edit',compact('specialite'));

   }

   public function update(Request $request,$id){
   	$special=Specialite::findOrFail($id);
   	$special->fill($request->all())->save();
   	$special->fill(['duree'=>dureeform()[$request['duree']]])
   	       ->fill(['volumeh'=>volumeh()[$request['volumeh']]])
   	       ->fill(['diplome'=>diplome()[$request['diplome']]])
           ->fill(['intitule' => intitulespecialite()[$request['intitule']]])
   	       ->fill(['conditionacc'=>conditionacc()[$request['conditionacc']]])
   	        ->save();
   	return back()->withFlashMessage('نم تعديل التخصص بنجاح');

   }
   
  
   public function delete($id){

   	$special=Specialite::findOrFail($id);
    
   	$special->delete();
   	return back()->withFlashMessage('تم حذف العامل بنجاح');
   
   }

   public function anyData(){
     $spes=Specialite::all();
     return DataTables::of($spes)
    
     ->editColumn('intitule',function($model){
      return \Html::Link('/adminpanel/specialites/'.$model->id.'/edit',$model->intitule);
     })

     

     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/specialites/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/specialites/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}


}
