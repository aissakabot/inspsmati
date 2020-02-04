@extends('layouts.main')
@section('title')
عرض النشاطان
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
    <li><a href="#">الرئيسية</a></li>
    <li ><a href="{{url('activites')}}">النشاطات</a></li>
        <li class="active"><a href="{{url('activites/'.$activite->id)}}">{{$activite->title}}</a></li>

</ul>

<div class="col-sm-9">

              
  <div class="box">
  <img src="{{asset('images/'.$activite->image)}}" alt="">
<h1>{{$activite->title}}</h1>
<span class="clearfix" ><i class="fa fa-clock-o"></i> {{date_format($activite->created_at,'Y-m-d')}}</span>

      <p>{{$activite->descrip}}</p>

</div>
<div class="comments">
@include('website.activites.comment.edit')

@include('website.activites.comment.show')
</div>
</div>


<div class="col-sm-3 hidden-xs">
<div class="derniernews">
<h1 style="text-align: center;">آخر الأخبار</h1>
@foreach($news=\App\Neww::get() as $new)
<div class="info">
<a href="{{url('/news/'.$new->id)}}"><img class="img-circle" src="{{asset('images/'.$new->image)}}" alt="" style="float:right;width:100px;height: 100px;margin-left: 20px"></a>
<h1 style="">{{$new->titre}}</h1>
<span class="clearfix">{{$new->created_at}}</span>
</div>
@endforeach
</div>

	
</div>
<div class="clearfix"></div>
</div>

@endsection