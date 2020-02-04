@extends('layouts.main')
@section('title')
عروض التكوين الجديدة
@endsection
@section('style')
<style type="text/css">
	li.active a{
		color:#000;
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


<div class="newsshow">
<ul class="breadcrumb">
   <li><a href="{{url('/')}}">الرئيسية</a></li>
    <li ><a href="{{url('offres')}}">التخصصات</a></li>
    <li class="active"><a href="{{url('offres/'.$offre->id)}}">{{$offre->codespecial}}</a></li>

</ul>



<div class="col-sm-9">

             <div class="insc">بعد الإطلاع على قائمة العروض يمكنك التوجه إلى صفحة التسجيل الإلكتروني <a href="{{url('/inscriptions')}}">من هنا</a></div> 
  <div class="box">
  <img src="{{asset('images/'.$offre->image)}}" alt="">
<h1>{{$offre->codespecial}}</h1>
     <h3 class="text-center">وصف التخصص</h3>
       <p>{{$offre->descrip}}</p>

</div>

</div>


<div class="col-sm-3 hidden-xs">
<div class="derniernews">
<h1 style="text-align: center;">آخر الأخبار</h1>
@foreach($news=\App\Neww::get() as $new)
<div class="info">
<a href="{{url('/news/'.$new->id)}}"><img class="img-circle" src="{{asset('images/'.$new->image)}}" alt="" style="float:right;width:100px;height: 100px;margin-left: 20px"></a>
<h3 style="font-size: 20px;">{{$new->titre}}</h3>
<span class="clearfix"><i class="fa fa-clock-o"></i> {{date_format($new->created_at,'Y-m-d')}}</span>
</div>
@endforeach
</div>

	
</div>
<div class="clearfix"></div>
</div>


  






@endsection