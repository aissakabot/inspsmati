@extends('layouts.main')
@section('title')
عرض التخصص الحالي
@endsection
@section('style')
<style type="text/css">
	li.active a{
		color:#000;
	}
</style>
@endsection
@section('content')


<div class="newsshow">
<ul class="breadcrumb">
   <li><a href="{{url('/')}}">الرئيسية</a></li>
    <li ><a href="{{url('actualspecialites')}}">التخصصات</a></li>
    <li class="active"><a href="{{url('actualspecialites/'.$actualspec->id)}}">{{$actualspec->intitule}}</a></li>

</ul>



<div class="col-sm-9">

              
  <div class="box">
  <img src="{{asset('images/'.$actualspec->image)}}" alt="">
<h1 style="font-size:20px;font-weight: bold;">{{$actualspec->intitule}}</h1>
       <p>{{$actualspec->descrip}}</p>

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


  



<style>
<style>
img{
	width: 100%;
	height: 100%;
	margin-bottom: 12px;
}
.item{
	position: relative;
	border: 2px solid #bb1250;
}
 .item .over{
	position:absolute;
	top:0;
	left:0;
	background-color: rgba(19, 94, 29, 0.45);
	width: 100%;
	height:100%;
	color:#fff;
	display: none;
	transition: all 1s ease-in-out;
}
.item .over h3{
padding-top:40%;
}
.item:hover .over{
	display: block;
}
</style>
</style>

@endsection