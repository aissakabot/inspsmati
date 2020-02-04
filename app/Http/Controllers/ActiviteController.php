<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addActiviteRequest;
use App\Activite;
use Yajra\Datatables\DataTables;


class ActiviteController extends Controller
{
    //

public function index(){
    	return view('admin.activites.index');

}
  
 public function create(){
 	return view('admin.activites.add');
 }  

public function store(addActiviteRequest $request){
dd($request);
  	$title=$request->title;
        $typeact=$request->typeact;
        $texte=$request->texte; 
        $keywordactivite=$request->keywordactivite;
       
        $destPathIm='images';
        
        
        if ($request->hasFile('image')){

        
        $photo=$request->file('image');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
        }
       
        
        $act=typeActivite();
        $activite=new Activite;
        $activite->title=$title;
         $activite->typeact=typeactivite()[$act[$typeact]];
         $activite->texte=$texte;
          
           $activite->keywordactivite=$keywordactivite;
            
        $activite->image=$fileim;
        
     
        
        $activite->save();
  	return redirect('/adminpanel/activites')->withFlashMessage('تمت عملية  النشاط بنجاح');

  }



  
public function anyData(){
     $activites=Activite::all();
     return DataTables::of($activites)
    
     ->editColumn('title',function($model){
      return \Html::Link('/adminpanel/activites/'.$model->id.'/edit',$model->titre);
     })
/*
     ->editColumn('special',function($realisation){
     	$special=realisSpecial();
      return  '<span class="badge badge-info">'.$realisation->special.'</span>' ;
    
     })*/
     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/activites/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/activites/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}



/*website */

public function liste(){

	$activites=Activite::paginate(12);
	return view('website.realisations.liste',compact('activites'));
}

}
