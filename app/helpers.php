
<?php

function getsetting($settingname='nomsite'){
	return App\SiteSetting::where('namesetting',$settingname)->first()->value;
}



function typeActivite(){
$array=['رياضي'=>'رياضي'
,'ثقافي'=>'ثقافي'
,'آخر'=>'آخر'];
return $array;
}

function typecadre(){
$array=['مدير'=>'مدير'
,'أستاذ'=>'أستاذ'
,'عامل إدارة'=>'عامل إدارة',
'عامل مهني'=>'عامل مهني'];

return $array;
}

function contact(){
$array=['1'=>'استفسار',
'2'=>'مشكلة',
'3'=>'اقتراح',
'4'=>'إعجاب'];
return $array;
}

function unreadmessage(){
	return \App\Contact::where('view',0)->get();
}

function countunreadmessage(){
	return \App\Contact::where('view',0)->count();
}
function pubnew($id){
$new=App\Neww::findOrfail($id);
$new->pub=1;
return true;
}
function unpubnew($id){
$new=App\Neww::findOrfail($id);
$new->pub=0;
return true;
}
/* specialites */
function brancheprof(){

	$array=[
    '1'=>"الفلاحة",'2'=>"الفنون والصناعة المطبعية",'3'=>"الحرف التقليدية",'4'=>"الخشب والتأثيث",'5'=>"البناء والأشغال العمومية",'6'=>"الكهرباء الإلكتزنيك والطاقة",'7'=>"الإعلام الآلي",'8'=>"تقنيات الإدارة والتسيير",
	];
	return $array;
}

function typespecialite(){

	$array=[
    '1'=>"أولي ",'2'=>"تأهيلي"
	];
	return $array;
}
function intitulespecialite(){

	$array=[
    '1'=>"معلوماتية خيار مطور الواب والوسائط الإعلامية",'2'=>"معلموماتية خيار قاعدة المعطيات",'3'=>"المحاسبة العامة",'4'=>"الفلاحة الصحراوية",'5'=>"الأشغال العمومية",'6'=>"مساح طوبوغرافي",'7'=>"الصناعة الخشبية",'8'=>"نظافة أمن وبيئة",'9'=>'تسيير الموارد البشرية','10'=>'أمين مديرية','11'=>'مسر أشغال البناء','12'=>'مصمم البسلتين','13'=>'حماية النباتات','14'=>'زراعة الخضراواتة','15'=>'معلوماتية خيار شبكات وانظمة معلوملتية','16'=>' معلوماتية خيار قاعدة المعطيات' ,
	];
	return $array;
}
function niveauqual(){

	$array=[
    '1'=>"1",'2'=>"2",'3'=>"3",'4'=>"4",'5'=>"5"
	];
	return $array;
}
function dureeform(){

	$array=[
    '1'=>"6",'2'=>"12",'3'=>"18",'4'=>"24",'5'=>"36"
	];
	return $array;
}

function volumeh(){

	$array=[
    '1'=>"728",'2'=>"1080",'3'=>"1800",'4'=>"2048",'5'=>"3060"
	];
	return $array;
}
function diplome(){
		$array=[
    '1'=>"شهادة التكوين المهني المتخصصة",'2'=>"شهادة الكفاءة المهنية",'3'=>"التحكم اللمهني",'4'=>"تقني ",'5'=>"تقني سامي"
	];
	return $array;
}
function conditionacc(){
		$array=[
    '1'=>"مستوى دراسي منخفض",'2'=>"الرابة متوسط",'3'=>"2 ثاوني",'4'=>"3 ثانوي ",'5'=>"بدون مستوى"
	];
	return $array;
}
function modepref(){
		$array=[
    '1'=>"إقامي",'2'=>"تمهين",'3'=>"عن بعد"
	];
	return $array;
}

function listesession(){
$ar=array();
	$sess=App\Ses::get();
	foreach($sess as  $value){
		$off=$value->libelle;
$ar[$off]=$off;
	}
	return $ar;

	}


function listespecial(){

	$ar=array();
	$sess=App\Specialite::get();
	foreach($sess as  $value){
		//$i=$value->id;
		$sp=$value->intitule;
$ar[$sp]=$sp;

	}
	return $ar;

	}

	function typeoffre(){

	$array=[
    'إقامي'=>"إقامي ",'تمهين'=>"تمهين",'معابر'=>"معابر",'دوس مسائية'=>"دوس مسائية",'عن بعد'=>"عن بعد"
	];
	return $array;
}

function listemodule(){

	$ar=array();
	$sess=App\Module::get();
	foreach($sess as  $value){
		$i=$value->id;
		$lib=$value->libelle;
$ar[$i]=$lib;

	}
	return $ar;

	}
	function typeprof(){
		$ar=array();
	$ar=['أستاذ'=>'أستاذ',
      'إداري'=>'إداري',
      'عامل'=> 'عامل'

	];
	return $ar;
	}
	 function  listeprof(){
	 	$ar=[];
$profs=App\Cadre::where('type','أستاذ')->get();
      foreach($profs as  $value){
		
		$lib=$value->nom;
$ar[$lib]=$lib;
}
return $ar;
	 }
	 
	 
	 function cptusers(){
	 	$cptuser=App\User::count();
	 	return $cptuser;
	 }
	  function cptactivites(){
	 	$cptact=App\Activite::count();
	 	return $cptact;
	 }
	  function cptrealisations(){
	 	$cptreal=App\Realisation::count();
	 	return $cptreal;
	 }
	
	

