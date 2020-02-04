<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cour;
use App\Modulespecial;
use Yajra\Datatables\DataTables;
use Auth;

class CourController extends Controller
{
    //
    public function index(){
    	return view('admin.cours.index');

}
  
 public function create(){
 	return view('admin.cours.add');
 }  
  public function store(Request $request){

  	$titre=$request->titre;
        $special=$request->special;
        $module=$request->module;
        $descrip=$request->descrip; 
        
        $destPathIm='cours';
        if ($request->hasFile('fichier')){
        $photo=$request->file('fichier');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
        }
       
        
       
        $cour=new Cour;
        $cour->titre=$titre;
         $cour->special=$special;
         $cour->descrip=$descrip;
          $cour->module=$module;
           $cour->user_id=auth::user()->id;
            
        $cour->fichier=$fileim;
        
     
        
        $cour->save();
  	return redirect('/adminpanel/'.auth::user()->id.'/cours')->withFlashMessage('تمت عملية  الإضافة بنجاح');

  }

public function edit($userid,$id){
   	$cour=Cour::findOrFail($id);
   	return view('admin.cours.edit',compact('cour'));

   }
   
   public function update($userid,$id,Request $request){
   	$cour=Cour::findOrFail($id);
    
   	$cour->fill($request->all())->save();
    
    
   	return back()->withFlashMessage('نم تعديل العضو بنجاح');

   }


   public function delete($userid,$id){
  $userid=auth::user()->id;
   	$cour=Cour::findOrFail($id);
  
   	$cour->delete();
   	return back()->withFlashMessage('تم حذف العضو بنجاح');
   }


public function anyData(){
     $cours=Cour::where('user_id',auth::user()->id);
     return DataTables::of($cours)
    
     ->editColumn('titre',function($model){
      return \Html::Link('/adminpanel/'.auth::user()->id.'/cours/'.$model->id.'/edit',$model->titre);
     })
/*
     ->editColumn('special',function($realisation){
     	$special=realisSpecial();
      return  '<span class="badge badge-info">'.$realisation->special.'</span>' ;
    
     })*/
     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/'.auth::user()->id.'/cours/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/'.auth::user()->id.'/cours/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}

 public function liste(){
      return view('website.cours.liste');

}
public function affichemat($spec){
  $mats=Modulespecial::where('special',$spec)->get();

      return view('website.cours.affichemat',compact('mats'));

}


public function affichemod(Request $request){
  $mats=Modulespecial::where('special',$request->speci)->get();

      return view('admin.cours.affichemod',compact('mats'));

}
public function affichemodule($mod){
  $mods=Cour::where('module',$mod)->get();


      return view('website.cours.affichemodule',compact('mods'));

}



}
