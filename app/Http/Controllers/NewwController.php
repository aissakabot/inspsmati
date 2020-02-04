<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addNewsRequest;
use App\Neww;
use Yajra\Datatables\DataTables;
class NewwController extends Controller
{
    public function create(){
    	return view('admin.news.add');
    }

    public function store(addNewsRequest $request, Neww $Neww){
    	$destPathIm='images';
        if ($request->hasFile('image')){

        $photo=$request->file('image');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
        }
    	$Neww->create([

    	'titre'=>$request['titre'],
    	'sujet'=>$request['sujet'],
    	'image'=>$fileim,
    	'video'=>$request['video'],
    	'keywordnews'=>$request['keywordnews'],
    	


    	]);
    	return redirect('/adminpanel/news')->withFlashMessage('تم تمت إضافة الخبر بنجاح');
    	    }


public function edit($id){
   	$neww=Neww::findOrFail($id);
   	
   	
   	return view('admin.news.edit',compact('neww'));

   }
   

   public function update(Request $request,$id){
   	$neww=Neww::findOrFail($id);
   	$neww->fill($request->all())->save();
   	return back()->withFlashMessage('نم تعديل الخبر بنجاح');

   }


   public function delete($id){

   	$new=Neww::findOrFail($id);
  
   	$new->delete();
   	return back()->withFlashMessage('تم حذف الخبر بنجاح');
   }

public function pubn($id){

}
public function index(){
    	return view('admin.news.index');
    }

public function anyData(){
     $news=Neww::all();
     return DataTables::of($news)
    
     ->editColumn('titre',function($model){
      return \Html::Link('/adminpanel/news/'.$model->id.'/edit',$model->titre);
     })

     ->editColumn('pub',function($model){
      $out=  $model->pub == 1 ?'<input type="checkbox" checked  >' : '<input type="checkbox">';
      $out.='<br><a href="'.url('adminpanel/news/pub'.$model->id).'">نشر</a>';
     return $out;
     })
     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/news/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
     
      $all .='<a href="'.url('/adminpanel/news/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}

/*website */

public function liste(){

  $newws=Neww::paginate(12);
  return view('website.news.liste',compact('newws'));
}
public function show($id){

  $neww=Neww::findOrFail($id);
  return view('website.news.show',compact('neww'));
}

}