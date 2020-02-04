<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addRealisationRequest;
use App\Realisation;
use Yajra\Datatables\DataTables;

class RealisationController extends Controller
{
    //
    public function index(){
    	return view('admin.realisations.index');

}
  
 public function create(){
 	return view('admin.realisations.add');
 }  
  public function store(addRealisationRequest $request){

  	$titre=$request->titre;
        $special=$request->special;
        $descrip=$request->descrip; 
        $daterealis=$request->daterealis;
        $keywordrealis=$request->keywordrealis;
        $equipe=$request->equipe;
        $destPathIm='images';
        if ($request->hasFile('imagerealis')){
        $photo=$request->file('imagerealis');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
        }
       
        
        $spec=listespecial();
        $realisation=new Realisation;
        $realisation->titre=$titre;
         $realisation->special=$spec[$special];
         $realisation->descrip=$descrip;
          $realisation->daterealis=$daterealis;
           $realisation->keywordrealis=$keywordrealis;
            
        $realisation->imagerealis=$fileim;
         $realisation->equipe=$equipe;
     
        
        $realisation->save();
  	return redirect('/adminpanel/realisations')->withFlashMessage('تمت عملية  الإضافة بنجاح');

  }

public function edit($id){
   	$realisation=Realisation::findOrFail($id);
   	return view('admin.realisations.edit',compact('realisation'));

   }
   public function changeimage(Request $request){
   	$id=$request->realisation_id;

   	$realis=Realisation::findOrFail($id);
   	$destPathIm='images';
        $photo=$request->file('image2');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
       

        $realis->fill(['imagerealis'=>$fileim])->save();
        return back()->withFlashMessage('تم تعديل الصورة بنجاح');
   }

   public function update(Request $request,$id){
   	$realisation=Realisation::findOrFail($id);
    $spec=listespecial();
   	$realisation->fill($request->all())
    ->fill([ $realisation->special=$spec[$request->special]])
    ->save();
   	return back()->withFlashMessage('نم تعديل العضو بنجاح');

   }


   public function delete($id){

   	$realis=Realisation::findOrFail($id);
  
   	$realis->delete();
   	return back()->withFlashMessage('تم حذف العضو بنجاح');
   }


public function anyData(){
     $realisations=Realisation::all();
     return DataTables::of($realisations)
    
     ->editColumn('titre',function($model){
      return \Html::Link('/adminpanel/realisations/'.$model->id.'/edit',$model->titre);
     })
/*
     ->editColumn('special',function($realisation){
     	$special=realisSpecial();
      return  '<span class="badge badge-info">'.$realisation->special.'</span>' ;
    
     })*/
     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/realisations/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/realisations/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
       $all .='<a href="'.url('/adminpanel/realisations/'.$model->id.'/comments').'"class="btn btn-info btn-circle"><i class="fa fa-trash-o"></i></a>';
      return $all;
   })
     ->make(true);
}



/*website */

public function liste(){

	$realisations=Realisation::paginate(12);
	return view('website.realisations.liste',compact('realisations'));
}
public function show($id){

  $realisation=Realisation::findOrFail($id);
  return view('website.realisations.show',compact('realisation'));
}
}