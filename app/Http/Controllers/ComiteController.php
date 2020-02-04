<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addComiteRequest;
use App\Comite;
use Yajra\Datatables\DataTables;

class ComiteController extends Controller
{
     public function  index(){
    	
    	return view('admin.comites.index');
    }
    
     

    public function  create(){
    	return view('admin.comites.add');
    }

   public function store(addComiteRequest $request,Comite $comite) {



   	$destPathIm='images';
        if ($request->hasFile('image')){
   
        $photo=$request->file('image');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
        }
   	 $comite->create([
            'libelle' => $request['libelle'],
            'descrip' => $request['descrip'],
            'datedebut' => $request['datedebut'],
            'datefin' => $request['datefin'],
            'membre' => $request['membre'],
            
            'image' => $fileim  
        ]);
   	 return redirect('/adminpanel/entreprise/comites')->withFlashMessage('تمت إضافة اللجنة بنجاح');
   }

   public function edit($id){
   	$comite=Comite::findOrFail($id);
   	return view('admin.comites.edit',compact('comite'));

   }

   public function update(Request $request,$id){
   	$comite=Comite::findOrFail($id);
   	$comite->fill($request->all())->save();
   	return back()->withFlashMessage('نم تعديل اللجنة بنجاح');

   }
   
   public function changeimage(Request $request){
   	$id=$request->comite_id;

   	$comite=Comite::findOrFail($id);
   	$destPathIm='images';
        $photo=$request->file('photo2');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
       

        $cadre->fill(['image'=>$fileim])->save();
        return back()->withFlashMessage('تم تعديل الصورة بنجاح');
   }
   public function delete($id){

   	$comite=Comite::findOrFail($id);
    
   	$comite->delete();
   	return back()->withFlashMessage('تم حذف العامل بنجاح');
   
   }

   public function anyData(){
     $comites=Comite::all();
     return DataTables::of($comites)
    
     ->editColumn('libelle',function($model){
      return \Html::Link('/adminpanel/entreprise/comites/'.$model->id.'/edit',$model->libelle);
     })

     

     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/entreprise/comites/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/entreprise/comites/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}
/*website */

public function liste(){

  $comites=Comite::paginate(12);
  return view('website.entreprise.comite.liste',compact('comites'));
}
public function show($id){

  $comite=Comite::findOrFail($id);
  return view('website.entreprise.comite.show',compact('comite'));
}

}
