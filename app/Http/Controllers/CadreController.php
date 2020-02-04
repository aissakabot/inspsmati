<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\addCadreRequest;
use App\Cadre;
use Yajra\Datatables\DataTables;
use App\DataTables\CadresDataTable;


class CadreController extends Controller
{
    public function  index(){
    	
    	return view('admin.cadres.index');
    }
    
     public function  home(CadresDataTable $dataTable){
       return $dataTable->render('admin.cadres.home');
      
    }

    public function  create(){
    	return view('admin.cadres.add');
    }

   public function store(addCadreRequest $request,Cadre $cadre) {



   	$destPathIm='images';
        if ($request->hasFile('image')){
   
        $photo=$request->file('image');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
        }
   	 $cadre->create([
            'nom' => $request['nom'],
            'prenom' => $request['prenom'],
            'prof' => $request['prof'],
            'type' => $request['type'],
            'datenomin' => $request['datenomin'],
            'faceb' => $request['faceb'],
            'tel' => $request['tel'],
            'email' => $request['email'],
            'image' => $fileim  
        ]);
   	 return redirect('/adminpanel/entreprise/cadres')->withFlashMessage('تمت إضافة العامل بنجاح');
   }

   public function edit($id){
   	$cadre=Cadre::findOrFail($id);
   	return view('admin.cadres.edit',compact('cadre'));

   }

   public function update(Request $request,$id){
   	$cadre=Cadre::findOrFail($id);
   	$cadre->fill($request->all())->save();
   	return back()->withFlashMessage('نم تعديل العضو بنجاح');

   }
   
   public function changeimage(Request $request){
   	$id=$request->cadre_id;

   	$cadre=Cadre::findOrFail($id);
   	$destPathIm='images';
        $photo=$request->file('photo2');
         $fileim=$photo->getClientOriginalName();
        $photo->move($destPathIm,$fileim);
       

        $cadre->fill(['image'=>$fileim])->save();
        return back()->withFlashMessage('تم تعديل الصورة بنجاح');
   }
   public function delete($id){

   	$cadre=Cadre::findOrFail($id);
    
   	$cadre->delete();
   	return back()->withFlashMessage('تم حذف العامل بنجاح');
   
   }

   public function anyData(){
     $cadres=Cadre::all();
     return DataTables::of($cadres)
    
     ->editColumn('nom',function($model){
      return \Html::Link('/adminpanel/entreprise/cadres/'.$model->id.'/edit',$model->nom);
     })

     

     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/entreprise/cadres/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/entreprise/cadres/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      
      return $all;
   })
     ->make(true);
}
/*website */

public function liste(){

  $cadres=Cadre::paginate(12);
  return view('website.entreprise.cadre.liste',compact('cadres'));
}
public function show($id){

  $cadre=Cadre::findOrFail($id);
  return view('website.entreprise.cadre.show',compact('cadre'));
}


public function histo(){

 
  return view('website.entreprise.histo');
}
public function motdirect(){

 
  return view('website.entreprise.motdirect');
}
public function orga(){

 
  return view('website.entreprise.organ');
}
}
