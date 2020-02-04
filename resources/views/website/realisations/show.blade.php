@extends('layouts.main')
@section('title')
عرض الإنجاز
@endsection
@section('style')
<style type="text/css">
	li.active a{
		color:#000;
	}
	p{
		text-align: justify;
		font-size: 15px;
		font-weight: bold;
		line-height: 2;
	}
</style>
@endsection
@section('content')
<div class="newsshow">
<ul class="breadcrumb">
<li><a href="#">الرئيسية</a></li>
    <li ><a href="{{url('realisations')}}">الإنجازات</a></li>
        <li class="active"><a href="{{url('realisations/'.$realisation->id)}}">{{$realisation->titre}}</a></li>
</ul>

<div class="col-sm-9">

              
  <div class="box">
  <img src="{{asset('images/'.$realisation->imagerealis)}}" alt="">
<h1>{{$realisation->titre}}</h1>
<span class="dat"><i class="fa fa-user"></i>{{$realisation->created_at}}</span>
      <p>{{$realisation->descrip}}</p>

</div>
<div class="comments">
@include('website.realisations.comment.edit')

@include('website.realisations.comment.show')
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