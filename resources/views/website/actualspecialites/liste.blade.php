@extends('layouts.main')
@section('title')
قائمة التخصصات الحالية
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
    <li><a href="{{url('/')}}">الرئيسية</a></li>
    <li class="active"><a href="{{url('actualspecialites')}}">التخصصات</a></li>
</ul>

<div class="col-sm-9">
<h2  class="text-center">قائمة التخصصات الحالية</h2>
              
  <div class="news">

    @forelse($actualspecs as $actualspec)
<div class="col-md-4 col-sm-6">
<div class="box">
<img src="{{asset('images/'.$actualspec->image)}}" alt="" >
<h1 class="text-center">{{$actualspec->intitule}}</h1> 
<p class="text-center"><a class="btn btn-info" href="{{url('/actualspecialites/'.$actualspec->id)}}">تعرف على التخصص</a></p>
</div>
  </div>    
      @empty
<h3> لا توجد إنجازات خاصة بالمتربصين حاليا</h3>
@endforelse
   
</div>
<div class="page text-center">{{ $actualspecs->links() }}</div>
</div>


<div class="col-sm-3 hidden-xs">
<div class="derniernews">
<h3>أخر الأخبار</h3>

@foreach($news=\App\Neww::get() as $new)
<div class="info">
<img class="img-circle" src="images/{{$new->image}}" alt="" style="float:right;width:100px;height: 100px;margin-left: 20px">
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