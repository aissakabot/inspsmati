<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addActualspecRequest;
use App\Actuelspecial;
use Yajra\Datatables\DataTables;
class ActuelspecialController extends Controller
{
    public function  index(){
    	
    	return view('admin.actuelspecials.index');
    }
    
    

    public function  create(){
    	return view('admin.actuelspecials.add');
    }

   public function store(addActualspecRequest $request,Actuelspecial $actuel) {


   	   $destPathIm='images';
        if ($request->hasFile('image')){
        	
        $photo=$request->file('image');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
        }

   	 $actuel->create([
            
            'intitule' => intitulespecialite()[$request['intitule']],
            'type' => typeoffre()[$request['type']],
            'datedebut'=>$request['datedebut'],
            'datefin'=>$request['datefin'],
            'soumestre' => $request['soumestre'],
            'professeur' => $request['professeur'],
            'descrip'=>$request['descrip'],
            'diplome' => diplome()[$request['diplome']] ,
            'image' =>$fileim,
            'nbstag' => $request['nbstag'],

         
        ]);
   	 return redirect('/adminpanel/actuelspecialites')->withFlashMessage('تمت إضافة التخصص بنجاح');
   }

   public function edit($id){
   	$actuel=Actuelspecial::findOrFail($id);
   	return view('admin.actuelspecials.edit',compact('actuel'));

   }

   public function update(Request $request,$id){
   	$actuel=Actuelspecial::findOrFail($id);
   	$actuel->fill($request->all())->save();
   	$actuel->fill(['type'=>typeoffre()[$request['type']]])
   	       
   	       ->fill(['diplome'=>diplome()[$request['diplome']]])
           ->fill(['intitule' => intitulespecialite()[$request['intitule']]])
   	       
   	        ->save();
   	return back()->withFlashMessage('تم تعديل التخصص بنجاح');

   }
   
  
   public function delete($id){

   	$actuel=Actuelspecial::findOrFail($id);
    
   	$actuel->delete();
   	return back()->withFlashMessage('تم حذف التخصص بنجاح');
   
   }
   public function changeimage(Request $request){
   	$id=$request->actuel_id;

   	$actuel=Actuelspecial::findOrFail($id);
   	$destPathIm='images';
        $photo=$request->file('image2');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
       

        $actuel->fill(['image'=>$fileim])->save();
        return back()->withFlashMessage('تم تعديل الصورة بنجاح');
   }

   public function anyData(){
     $actuels=Actuelspecial::all();
     return DataTables::of($actuels)
    
     ->editColumn('intitule',function($model){
      return \Html::Link('/adminpanel/actuelspecialites/'.$model->id.'/edit',$model->intitule);
     })

     

     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/actuelspecialites/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/actuelspecialites/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}

/*website */

public function liste(){

  $actualspecs=Actuelspecial::paginate(12);
  return view('website.actualspecialites.liste',compact('actualspecs'));
}
public function show($id){

  $actualspec=Actuelspecial::findOrFail($id);
  return view('website.actualspecialites.show',compact('actualspec'));
}

}
