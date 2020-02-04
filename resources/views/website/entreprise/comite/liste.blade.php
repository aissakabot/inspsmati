@extends('layouts.main')
@section('title')
قائمة لجان المعهد
@endsection

@section('style')
<style>
.comites .box{
	width: 96%;
	margin:auto;
	padding-top: 10px;
	background-color: #c2c2c2;
	color:#000;
}
.comites img{
	width: 86%;
	display: block;
	margin: auto;
	height: 250px;
}
.comites p{
	padding-right: 15px;

}
.comites p span{
	color: red;
	font-weight: bold;
}
.comites p::before{
	content:;
}
.derniernews{
	background-color: #fff;
	padding-top:12px;
}
.derniernews .info{
	padding-bottom: 20px;
	display: block;
	width: 80%;
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
<div class="comites">
<ul class="breadcrumb">
    <li><a href="{{url('/')}}">الرئيسية</a></li>
    <li class="active"><a href="{{url('/comites')}}">اللجان</li>
</ul>
<div class="row">
<div class="col-sm-9" style="background-color: #fff ;margin-top: 18px;">
<h1  class="titre">قائمة لجان المعهد</h1>
          
<div class="activites">

    @forelse($comites as $comite)

<div class="col-md-6" style="margin-bottom:30px;">
<div class="box">
<img src="{{asset('images/'.$comite->image)}}" alt="" >
<h1 style="text-align: center;font-weight: bold">{{$comite->libelle}}</h1> 
<p class="com"><span>تاريخ التنيب:</span>{{$comite->datedebut}}</p>
<p class="com"><span>تاريخ نهاية العهدة:</span>{{$comite->datefin}}</p>
<p class="com"><span>وصف اللحنة:</span>{{$comite->descrip}}</p>
<p class="com"><span>أعضاء اللجنة:</span>{{$comite->membres}}</p>

        



</div>
  </div>  
      @empty
<h3> لا توجد قائمة لجان بالمعهد حاليا</h3>
@endforelse
<div class="clearfix"></div>

</div>
<div class="page text-center">{{ $comites->links() }}</div>
</div>


<div class="col-sm-3 hidden-xs">
<div class="derniernews">
<h1 class="text-center" style="font-size:20px;font-weight:bold;">آخــر الأخــبار</h1>

@foreach($news=\App\Neww::get() as $new)
<div class="info">
<a href="{{url('/news/'.$new->id)}}"><img class="img-circle" src="{{asset('images/'.$new->image)}}" alt="" style="float:right;width:100px;height: 100px;margin-left: 20px"></a>
<h1 style="font-size:17px">{{$new->titre}}</h1>
<span class="clearfix">{{$new->created_at}}</span>
</div>
@endforeach

</div>
   

  
</div>
<div class="clearfix"></div>
</div>


</div>

@endsection