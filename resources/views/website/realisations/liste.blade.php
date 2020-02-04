@extends('layouts.main')
@section('title')
أنجازات المتربصين
@endsection
@section('style')
<style type="text/css">
li.active a{
    color:#000;
  }
  .newslist .box{
    position: relative;
    border-radius: 0;
    border: none;
    box-shadow: none;
  }
  .box::after{
    content: '';
    position: absolute;
    width:3px;
    height: 0;
    top:0;
    right: 0;
    background-color: #11b7e6;
    opacity: 0.7;
    
    transition: all 0.3s ease-in-out;
  }
  .box:hover::after{
    width: 2x;
    height: 100%;
  }
  .over a{
   
    color: #fff;
    font-weight: bold;

  }
  .box:hover .over{
    display: block;
  }
    @media (max-width: 767px){
.newslist .box {
    height: 250px;
}
}
</style>
@endsection
@section('content')


<div class="newslist">
<ul class="breadcrumb">
   <li><a href="#">الرئيسية</a></li>
    <li class="active"><a href="{{url('realisations')}}">الإنجازات</li>
</ul>

<div class="col-sm-9">
<h1  class="titre">قائمة الإنجازات</h1>
              
  <div class="activites">

    @forelse($realisations as $realisation)

<div class="col-md-4 col-xs-6" style="margin-bottom:30px;">
<div class="box">
<img src="{{asset('images/'.$realisation->imagerealis)}}" alt="" >
<h1 style="text-align: center;font-weight: bold">{{$realisation->titre}}</h1> 


        

        <div class="over" style="text-align: center">
        <a  class="btn btn-info" href="{{url('/realisations/'.$realisation->id)}}"> طالع الموضوع</a>
        </div>


</div>
  </div>  
      @empty
<h3> لا توجد إنجازات خاصة بالمتربصين حاليا</h3>
@endforelse
<div class="clearfix"></div>

</div>
<div class="page text-center">{{ $realisations->links() }}</div>
</div>


<div class="col-sm-3 hidden-xs">
<div class="derniernews">
<h1 class="text-center" style="font-size:20px;">آخرالأخبار</h1>

@foreach($news=\App\Neww::orderBy('created_at','desc')->take(5)->get() as $new)
<div class="info">
<a href="{{url('/news/'.$new->id)}}"><img class="img-circle" src="images/{{$new->image}}" alt="" style="float:right;width:100px;height: 100px;margin-left: 20px"></a>
<h3 style="font-size: 20px;">{{$new->titre}}</h3>
<span class="clearfix"><i class="fa fa-clock-o"></i> {{date_format($new->created_at,'Y-m-d')}}</span>
</div>
@endforeach

</div>
   

  
</div>
<div class="clearfix"></div>
</div>


@endsection