<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Resultat;
use App\Inscrit;
use Illuminate\Support\Facades\Hash;
class StagController extends Controller
{
    //
    public function loginstagaffiche(){

    	return view('website.stagiaires.identifier');
    }
    public function loginstag(Request $request){

    	$num=$request->numinscrit;
    	$pass=$request->password;
    	

      $ins=Inscrit::where('numins',$num)->first();
      if(!empty($ins)){
        if(Hash::check($pass, $ins->password)) {

      $res=Resultat::where('numinscrit',$num)->first();
return view('website.stagiaires.deliberation',compact('res'));
    }
    else{
      return  back()->with('status','تحقق من كلمة المرور');
    }
}
else{
   return  back()->with('status','تحقق من رقم التسجيل الذي أدخاته');

}
     
}

    public function afficheres(Request $request){
     
     $numins=$request->numinscrit;
     $soum=$request->soumes;
     $resu=Resultat::where('numinscrit',$numins)->where('soum',$soum)->first();
     

    	return view('website.stagiaires.afficheres',compact('resu'));}
    
    
}
