@extends('layouts.main')
@section('title')
قائمة عمال المعهد
@endsection

@section('style')
<style>
.mcontainer img{
	display: block;
	width: 120px;
	height: 120px;
	margin: 10% auto;
	border-radius: 50%;
	
}
.mcontainer{
	width:95%;
	height: 250px;
	padding-bottom: 25px;
	position:relative;
}
.mcontainer .card{
	width:100%;
	height: 100%;
	position: absolute;
	transform-style: preserve-3d;
	transition: all .4s ease-in-out;

}
.mcontainer .card:hover{
	transform: rotateY(180deg);
}
.mcontainer .card .frontend{
	position: absolute;
	width: 100%;
	height: 100%;
	backface-visibility: hidden;
	color: #333;
	background-color: #ffc728;
}
.mcontainer .card .frontend h1,
.mcontainer .card .frontend p
{ 
  text-align: right;
  margin-right: 10px;
  margin-bottom: 15px;
  font-weight: bold;
  font-size: 14px;
	}
	.mcontainer .card .frontend a{
		text-decoration: none;
		color: #000;
	}
.mcontainer .card .backend{
	position: absolute;
	width: 100%;
	height: 100%;
	backface-visibility: hidden;
	color: #fff;
	background-color:#000 ;
	transform: rotateY(180deg);
	padding: 20px;
	font-weight: bold;
}
.derniernews{
	background-color: #fff;
}
.derniernews .info{
	padding-bottom: 20px;
	display: block;
	width: 60%;
	margin:auto;
	border-bottom: 2px solid #ccc;
	margin-bottom:20px;
}
.derniernews .info img{
width:100px;
height: 100px;margin-left: 20px
}

.titre{
	background-color: #fff;
	color: #11b7e6;
	text-align: center;
	font-size: 25px;
	font-weight: bold;
	height: 40px;
}

	li.active a{
		color:#000;
	}

</style>
@endsection

@section('content')
<div class="cadres">
<ul class="breadcrumb">
    <li><a href="{{url('/')}}">الرئيسية</a></li>
    <li class="active"><a href="{{url('/cadres')}}">العمال</li>
</ul>
<div class="row">
<div class="col-sm-9" style="background-color: #fff ;margin-top: 18px;">
<h1  class="titre">قائمة عمال المعهد</h1>
          
<div class="row" style="margin-right:0px">
    @forelse($cadres as $cadre)
<div class="col-md-4 col-xs-6" style="margin-bottom: 20px">
<div class="mcontainer">
<div class="card">
<div class="frontend">
	
<img src="{{asset('images/'.$cadre->image)}}" alt="" >
<a href="/cadres/{{$cadre->id}}"><h1>{{$cadre->nom}} {{$cadre->prenom}} </h1></a> 
<p>{{$cadre->prof}}</p>

      
</div>
<div class="backend">
	<p>تاريخ التنصيب:{{$cadre->datenomin}}</p>
	<p>البريد الإلكتروني:{{$cadre->email}}</p>
	<p>رقم الهاتف:{{$cadre->tel}}</p>
	<p>حساب الفيسبوك:{{$cadre->facebook}}</p>
	<p>تاريخ الميلاد:{{$cadre->nom}}</p>
</div>


</div>

</div>
</div>
  @empty
<h3> لا توجد قاءمو عمال حاليا</h3>
@endforelse
</div>
 {{ $cadres->links()}}
</div>




<div class="col-sm-3 hidden-xs" style="padding-top: -20px;">
<div class="derniernews">
<h1 class="titre">آخر الأخبار</h1>

@foreach($news=\App\Neww::get() as $new)
<div class="info">
<a href="{{url('/news/'.$new->id)}}"><img class="img-circle" src="images/{{$new->image}}" alt=""></a>
<h3 style="font-size: 20px;">{{$new->titre}}</h3>
<span class="clearfix"><i class="fa fa-clock-o"></i> {{date_format($new->created_at,'Y-m-d')}}</span>
</div>
@endforeach

</div>

	
</div>

</div>


</div>

@endsection