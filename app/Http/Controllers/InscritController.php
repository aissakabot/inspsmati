<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddInscritRequest;
use App\Inscrit;

use App\Ses;
use Yajra\Datatables\DataTables;
use Illuminate\Support\Facades\Hash;
class InscritController extends Controller
{
     public function  index(){
    
    	
    	return view('admin.inscriptions.index');
    }
    
    

    public function  create(){
      

    	return view('admin.inscriptions.add');
    }

   public function store(addInscritRequest $request) { 
    /*
$request->validate(['nomins' => 'required|max:150',
            'prenomins' =>'required|max:150',
            'dobins' => 'required',
            'lieuins' => 'required',
            'email' =>'required|email|unique:inscrits',
            'tel' => 'required',
            'password' => 'required|min:6',
            'adrins' => 'required',
            
            'special' => 'required',
            'niveauins' => 'required']);*/

$sess=Ses::orderBy('datedebut','desc')->first();
 
   	 $ins=new Inscrit();
            $ins->nomins = $request->nomins;
            $ins->prenomins = $request->prenomins;
            $ins->dobins = $request->dobins;
            $ins->lieuins = $request->lieuins;
            $ins->adrins = $request->adrins;
            $ins->tel = $request->tel;
           $ins->email = $request->email;
            $ins->password=bcrypt($request->password);
            $ins->special = $request->special;
            $ins->session =$sess->libelle;
            
            $ins->niveauins = conditionacc()[$request->input('niveauins')];
            $ins->save();
       
     if($request->path() == 'adminpanel/inscriptions'){
   	 return redirect('/adminpanel/inscriptions')->withFlashMessage('تمت إضافة التسجيل الأولي  بنجاح');}
     else{
      return redirect('/inscriptions')->withFlashMessage('تمت إضافة التسجيل الأولي  بنجاح');}
     }
   

   public function edit($id){
   	$inscrit=Inscrit::findOrFail($id);
   	return view('admin.inscriptions.edit',compact('inscrit'));

   }

   public function update(Request $request,$id){
   	$inscrit=Inscrit::findOrFail($id);
   	$inscrit->fill($request->all())->save();
   	return back()->withFlashMessage('تم تعديل التسجيل بنجاح');

   }
   
  
   public function delete($id){

   	$inscrit=Inscrit::findOrFail($id);
    
   	$inscrit->delete();
   	return back()->withFlashMessage('تم حذف التسجيل بنجاح');
   
   }

   public function anyData(){
     $inscrits=Inscrit::all();
     return DataTables::of($inscrits)
    
     ->editColumn('nomins',function($model){
      return \Html::Link('/adminpanel/inscriptions/'.$model->id.'/edit',$model->nomins);
     })

     

     ->editColumn('control',function($model){
      $all='<a href="'.url('/adminpanel/inscriptions/'.$model->id.'/edit').'" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
      
      $all .='<a href="'.url('/adminpanel/inscriptions/'.$model->id.'/delete').'"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';
      $all .='<a href="'.url('/adminpanel/inscriptions/'.$model->id.'/confirm').'"class="btn btn-success btn-circle" ><i class="fa fa-check"></i></a>';
      
      return $all;
   })
     ->make(true);
}

/*website*/
 public function  add(){
  $session=Ses::orderBy('created_at','desc')->first();
      return view('website.inscriptions.add',compact('session'));
    }

public function connecter(){
  return view('website.inscriptions.login');
}
public function checkinscrit(Request $request){

$email=$request->email;
$pass=$request->password;

$res=Inscrit::where('email',$email)->first();
 if($res){
if(Hash::check($pass, $res->password)) {

    $id=$res->id;
  return redirect('/inscriptions/'.$id.'/edit');
}
else{
  return back()->with('status','تحقق من البريد الإلكتروني وكلمة المرور');
}
}

}

public function modif($id){
    $inscrit=Inscrit::findOrFail($id);
    return view('website.inscriptions.edit',compact('inscrit'));

   }

   public function miseajour(Request $request,$id){
    $inscrit=Inscrit::findOrFail($id);
    $inscrit->fill($request->all())->save();
    return back()->withFlashMessage('تم تعديل التسجيل بنجاح');

   }
    
    public function addnumins(Request $request,$id){
$inscrit=Inscrit::findOrFail($id);
    $inscrit->fill(["numins"=>$request->numins])->save();
    return back()->withFlashMessage('تم ادخال رقم التسجيل بنجاح');

    }
   public function changepassword(Request $request){
    $inscrit=Inscrit::findOrFail($request->inscrit_id);

    $pass=bcrypt($request->password);
    $inscrit->fill(['password'=>$pass])->save();
  
    return back()->withFlashMessage('تم تعديل كلمة المرور بنجاح');
   }


 public function confirminscrit($id){
  
   $inscrit=Inscrit::findOrFail($id);

//$ps= Hash::make(str_random(8));


  //  $inscrit->password=$ps;
    $inscrit->confirm=1;
    $inscrit->save();
  
    return back()->withFlashMessage('تم تأكيد التسجيل بنجاح');
   }
}
