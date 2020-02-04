@extends('layouts.main')
@section('title')
قائمة الأخبار
@endsection
@section('style')
<style type="text/css">
	li.active a{
		color:#000;
	}
</style>
@endsection
@section('content')


<div class="newslist">
<ul class="breadcrumb">
   <li><a href="{{asset('/')}}">الرئيسية</a></li>
    <li class="active"><a href="{{asset('/news')}}">الاخبار</a></li>
</ul>

<h1  class="titre">قائمة الأخبار والمواضيع</h1>
              
  <div class="news">

    @forelse($newws as $neww)

<div class="col-md-4 col-xs-6" style="margin-bottom:20px;">
<div class="box">
<img src="{{asset('images/'.$neww->image)}}" alt="" >
<a href="/news/{{$neww->id}}"><h1>{{$neww->titre}}</h1></a> 

</div>
  </div>  
      @empty
<h3> لا توجد إنجازات خاصة بالمتربصين حاليا</h3>
@endforelse
<div class="clearfix"></div>
</div>
<div class="page text-center">{{ $newws->links() }}</div>




<div class="clearfix"></div>
</div>
@endsection