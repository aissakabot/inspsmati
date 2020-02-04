@extends('layouts.main')
@section('title')
قائمة عروض التكوين الجديدة
@endsection

@section('style')
<style>
.affiche{
	margin-top: 20px;
	padding: 20px;
}
table th{
	font-weight: bold;
	padding:10px;
	color: #000;
}
.insc{
	background-color: #fff;
     color:#000;
     width:80%;

	margin:10px auto;
	font-size: 15px;
	height: 30px;
	padding-right: 10%;
}
</style>

@endsection


@section('content')
<div class="offres">
<div class="container">
<div class="affiche">

<div class="insc">بعد الإطلاع على قائمة العروض يمكنك التوجه إلى صفحة التسجيل الإلكتروني <a href="{{url('/inscriptions')}}">من هنا</a></div>
<h1> اختر نمط التكوين:</h1>
<ul>
<li class="col-sm-3  col-xs-6 cont" data-toggle="tooltip" title="تعريف التكون الإقمي"><img id="resid" data-class=".reside" src="images/cent1.jpg" alt=""> التكوين الإقامي</li>
<li class="col-sm-3 col-xs-6 cont" data-toggle="tooltip" title="تعريف التكون الإقمي"><img id="apprenti" data-class=".apprenti" src="images/cent2.jpg" alt=""> التكوين عن طريق التمهين</li>
<li class="col-sm-3 col-xs-6 cont" data-toggle="tooltip" title="تعريف التكون الإقمي"><img id="soir" data-class=".soir" src="images/cent3.jpg" alt=""> التكوين عن طريق الدروس المسائية</li>
<li class="col-sm-3 col-xs-6 cont" data-toggle="tooltip" title="تعريف التكون الإقمي"> <img  id="passer"data-class=".passer" src="images/cent4.jpg" alt=""> التكوين عن طريق المعابر</li>
<div class="clearfix"></div>
</ul>
</div>

<div class="content">
<div clas="container">
<div class="resid">
<h2 class="text-center">عروض التكوين الخاصة بالإقامي</h2>
@forelse($offres=App\Offre:: where('typeoffre','إقامي')->get() as $offre)
<div class="col-sm-4">
<div class="box">
<a href="{{url('/offres/'.$offre->id)}}"><img src="{{asset('images/'.$offre->image)}}" alt="" ></a><h3 class="text-center">{{$offre->codespecial}}</h3>
@foreach($ss=App\Specialite::where('intitule',$offre->codespecial)->get() as $spec)
<table>
<tr>
<th>المستوى المطلوب:</th><td>{{$spec->conditionacc}}</td></tr>
 <tr><th>المدة:</th><td>{{$spec->duree}} شهرا</td></tr>
<tr><th>الشهادة:</th><td>{{$spec->diplome}}</td></tr></table>
@endforeach
</div>
</div>
@empty
<div class="alert alert-danger">
	 لا توجد عروض خاصة بهذا النمط في هذه الدورة
</div>
@endforelse

<div class="clearfix"></div>
</div>
<div class="apprenti">
<h2 class="text-center">عروض التكوين الخاصة بالتمهين</h2>
@forelse($offres=App\Offre:: where('typeoffre','تمهين')->get() as $offre)
<div class="col-sm-4">
<div class="box">
<a href="{{url('/offres/'.$offre->id)}}"><img src="{{asset('images/'.$offre->image)}}" alt="" ></a>
<h3 class="text-center">{{$offre->codespecial}}</h3>
@foreach($ss=App\Specialite::where('intitule',$offre->codespecial)->get() as $spec)
<table>
<tr>
<td>المستوى المطلوب:</td><td>{{$spec->conditionacc}}</td></tr>
 <tr><td>المدة:</td><td>{{$spec->duree}} شهرا</td></tr>
<tr><td>الشهادة:</td><td>{{$spec->diplome}}</td></tr></table>
@endforeach
</div>
</div>
@empty
<div class="alert alert-danger">
	 لا توجد عروض خاصة بهذا النمط في هذه الدورة
</div>
@endforelse

<div class="clearfix"></div>
</div>
<div class="soir">
<h2 class="text-center">عروض التكوين الخاصة بالدروس المسائية</h2>
@forelse($offres=App\Offre:: where('typeoffre','مسائي')->get() as $offre)
<div class="col-sm-4">
<div class="box">
<a href="{{url('/offres/'.$offre->id)}}"><img src="{{asset('images/'.$offre->image)}}" alt="" ></a>
<h3 class="text-center">{{$offre->codespecial}}</h3>
@foreach($ss=App\Specialite::where('intitule',$offre->codespecial)->get() as $spec)
<table>
<tr>
<th>المستوى المطلوب:</th><td>{{$spec->conditionacc}}</td></tr>
 <tr><th>المدة:</th><td>{{$spec->duree}} شهرا</td></tr>
<tr><th>الشهادة:</th><td>{{$spec->diplome}}</td></tr></table>
@endforeach
</div>
</div>
@empty
<div class="alert alert-danger">
	 لا توجد عروض خاصة بهذا النمط في هذه الدورة
</div>
@endforelse

<div class="clearfix"></div>
</div>
<div class="passer">
<h2 class="text-center">عروض التكوين الخاصة بالمعابر</h2>
@forelse($offres=App\Offre:: where('typeoffre','معابر')->get() as $offre)
<div class="col-sm-4">
<div class="box">
<a href="{{url('/offres/'.$offre->id)}}"><img src="{{asset('images/'.$offre->image)}}" alt="" ></a>
<h3 class="text-center">{{$offre->codesepecial}}</h3>
@foreach($ss=App\Specialite::where('intitule',$offre->codespecial)->get() as $spec)
<table>
<tr>
<th>المستوى المطلوب:</th><td>{{$spec->conditionacc}}</td></tr>
 <tr><th>المدة:</th><td>{{$spec->duree}} شهرا</td></tr>
<tr><th>الشهادة:</th><td>{{$spec->diplome}}</td></tr></table>
@endforeach

</div>
</div>
@empty
<div class="alert alert-danger">
	 لا توجد عروض خاصة بهذا النمط في هذه الدورة
</div>
@endforelse

<div class="clearfix"></div>
</div>

</div>
</div>
</div>
</div>


@endsection
@section('script')
<script>

$(".offres #resid").click(function(){

	$(".content .resid").slideToggle(1000).siblings().hide();
   
})
$(" .offres #apprenti").click(function(){

	$(".content .apprenti").slideToggle(1000).siblings().hide();
	
})
$(" .offres #soir").click(function(){

	$(".content .soir").slideToggle(1000).siblings().hide();
	
})
$(".offres #passer").click(function(){

	$(".content .passer").slideToggle(1000).siblings().hide();
	
})

$('[data-toggle="tooltip"]').tooltip(); 

</script>
@endsection





