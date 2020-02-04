<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;

class SiteSettingController extends Controller
{
    //
    public function index(){
    	$settings=SiteSetting::get();
    	return view('admin.settings.index',compact('settings'));
    }

   public function store(Request $request){
   	foreach (array_except($request->toArray(),['_token','submit']) as $key=>$req){
   		echo $req;
   		$sitesetting=SiteSetting::where('namesetting',$key)->get()[0];
   		
   		$sitesetting->fill(['value'=>$req])->save();

   	}
   	return back()->withFlashMessage('تم تعديل الإعدادات');
   } 
}
