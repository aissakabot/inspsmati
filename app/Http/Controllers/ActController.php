<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addActRequest;
use App\Activite;
use Yajra\Datatables\DataTables;

use Validator;


class ActController extends Controller
{
    //

public function index(){
    	return view('admin.activites.index');

}
  
 public function create(){
 	return view('admin.activites.add');
 }  

public function store(Request $request){

$rules = [
            'title'=>'required|min:5|max:150',
            'typeact'=>'required',
            'texte'=>'required',
            'image'=>'required|image|mimes:png,jpg,jpeg',
            
            'keywordactivite'=>'required',

          

        ];
        $messages=[
           'title.required'=>'يجب ادخال قيمة لهذا الحقل',
           'texte.required'=>'يجب ادخال قيمة لهذا الحقل',
           'title.min'=>'ادخل على الأقل 25 حرفا',
           'keywordactivite.required'=>'يجب ادخال قيمة لهذا الحقل',
           'image.required'=>'يجب ادخال قيمة لهذا الحقل',
           'image.image'=>'يجب اختيار ملف صورة(jpg,jpeg,png)',
           'image.max'=>'حجم الملف لا يتجاوز 2m',
           'typeact.required'=>'يجب ادخال قيمة لهذا الحقل',
        ];

        $this->validate($request, $rules, $messages);

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
        $activite=new Activite;
        $activite->title=$title;
         $activite->typeact=$typeact;
         $activite->texte=$texte;
          
           $activite->keywordactivite=$keywordactivite;
            
        $activite->image=$fileim;
        $activite->save();
  	return redirect('/adminpanel/activites')->withFlashMessage('تمت عملية  النشاط بنجاح');

  }


public function edit($id){
   	$activite=Activite::findOrFail($id);
   	return view('admin.activites.edit',compact('activite'));

   }
   public function changeimage(Request $request){
   	$id=$request->activite_id;

   	$acti=Activite::findOrFail($id);
   	$destPathIm='images';
        $photo=$request->file('image2');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
       

        $acti->fill(['imagerealis'=>$fileim])->save();
        return back()->withFlashMessage('تم تعديل الصورة بنجاح');
   }

   public function update(Request $request,$id){
   	$activite=Activite::findOrFail($id);
   	$activite->fill($request->all())->save();
   	return back()->withFlashMessage('نم تعديل النشاط بنجاح');

   }


   public function delete($id){

   	$realis=Activite::findOrFail($id);
  
   	$realis->delete();
   	return back()->withFlashMessage('تم حذف النشاط بنجاح');
   }



  
public function anyData(){
     $activites=Activite::all();
     return DataTables::of($activites)
    
     ->editColumn('title',function($model){
      return \Html::Link('/adminpanel/activites/'.$model->id.'/edit',$model->title);
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
	return view('website.activites.liste',compact('activites'));
}
public function show($id){

  $activite=Activite::findOrFail($id);
  return view('website.activites.show',compact('activite'));
}

}
