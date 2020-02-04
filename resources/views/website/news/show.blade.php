@extends('layouts.main')
@section('title')
عرض الخبر
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
    <li><a href="{{asset('/')}}">الرئيسية</a></li>
    <li ><a href="{{asset('/news')}}">الاخبار</a></li>
     <li class="active"><a href="{{asset('/news/'.$neww->id)}}">{{$neww->titre}}</a></li>
</ul>

<div class="col-sm-9">

              
  <div class="box">
  <img src="{{asset('images/'.$neww->image)}}" alt="">
<h1>{{$neww->titre}}</h1>
<span class="dat"><i class="fa fa-user"></i>{{$neww->created_at}}</span>
      <p>{{$neww->sujet}}</p>

</div>
<div class="comments">
@include('website.news.comment.edit')

@include('website.news.comment.show')
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