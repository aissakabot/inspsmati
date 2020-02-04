<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use App\Http\Requests\addDocumentRequest;
use Yajra\Datatables\DataTables;
class DocumentController extends Controller
{
    //
     public function index(){
    	return view('admin.documents.index');

}
  
 public function create(){
 	return view('admin.documents.add');
 }  
  public function store(addDocumentRequest $request){

  	$libelle=$request->libelle;
        $descrip=$request->descrip;
       
        $destPathIm='docs';
        if ($request->hasFile('fichier')){
        $photo=$request->file('fichier');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
        }
     
        $doc=new Document;
        $doc->libelle=$libelle;
         $doc->descrip=$descrip;
         
        $doc->fichier=$fileim;
        
     
        
        $doc->save();
  	return redirect('/adminpanel/documents')->withFlashMessage('تمت عملية  إضافة الويقة بنجاح');

  }

public function edit($id){
   	$document=Document::findOrFail($id);
   	return view('admin.documents.edit',compact('document'));

   }
   
   public function update($id,Request $request){
   	$document=Document::findOrFail($id);
    
   	$document->fill($request->all())->save();
    
    
   	return back()->withFlashMessage('نم تعديل الويقة بنجاح');

   }

 public function changeimage(Request $request){
   	$id=$request->document_id;

   	$document=Document::findOrFail($id);
   	$destPathIm='docs';
        $photo=$request->file('fich');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
       

        $acti->fill(['fichier'=>$fileim])->save();
        return back()->withFlashMessage('تم تعديل الصورة بنجاح');
   }
   public function delete($id){
  $document=Document::findOrFail($id);
   	
   	$document->delete();
   	return back()->withFlashMessage('تم حذف الوثيقة بنجاح');
   }


public function anyData(){
     $docs=Document::all();
     return DataTables::of($docs)
    
     ->editColumn('libelle',function($model){
      return \Html::Link('/adminpanel/documents/'.$model->id.'/edit',$model->libelle);
     })
/*
     ->editColumn('special',function($realisation){
     	$special=realisSpecial();
      return  '<span class="badge badge-info">'.$realisation->special.'</span>' ;
    
     })*/
     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/documents/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/documents/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}



 public function liste(){
 	$docs=Document::paginate(15);
      return view('website.documents.liste',compact('docs'));

}
}
