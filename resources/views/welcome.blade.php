@extends('layouts.main')
@section('title')
@endsection
@section('style')
<style type="text/css">
  .boxreal a{
    text-decoration: none;
    color: #fff;
  }
  .vid{
    width: 100%;
    height: 280px;
    position: relative;
  }
  .backg{
    position: absolute;
background: rgba(0,0,0,0.65);
background-size: cover;
width: 100%;
height: 120%;
margin-top:-15px;



  }
  .vid .video{

    position: absolute;
    height: 100%;
    width: 100%;
  object-fit: cover;
    z-index: -1000;
    

  }
  .vid .p1 ,.vid .p2{
    position: absolute;
    top:30%;
    right: 30%;
    color: #fff;
    font-weight: bold;
  font-size: 28px;
  }
  .vid .p2{
    top:45%;
    right: 40%;
  color: orange;
  font-size: 20px;
  }
  @media(max-width:768px){
  
  .vid .p1 ,.vid .p2{
  font-size:19px;
  }
  }
  
  #myCarousel .item{
	position: relative;
}

#myCarousel .overlay{
	position: absolute;
	top:0;
	right:0;
	width: 100%;
	height: 100%;
	background-color: rgba(0,0,0,.4);
}
#myCarousel .carousel-caption{
	position: absolute;
	top:30%;
	right:20%;
	color:#fff;
	padding-top: 10px;
}
#myCarousel .carousel-caption h2{
	font-size: 36px;
	font-weight: bold;
	margin-bottom: 20px;
}
#myCarousel .carousel-caption p{
	font-size: 25px;
}

.carousel-indicators li{
	background-color: #fff;
	border:2px solid orange;

}
.carousel-indicators .active{
	background-color: orange;
	border-color: #fff;

}
  
</style>
@endsection
@section('content')
<!-- slider -->
@include('layouts.slide')

<!-- end slider -->
 <!--  content -->

<div class="content principale">
<div class="container">
<div class="row">
<div class="col-sm-9">
<!-- section realisations stagiaires -->
<div class="realisations">
  
   <h1 class="titre text-center">إنجازات المتربصين</h1>
    <div class="row">
    @foreach($realis=\App\Realisation::take(4)->get() as $reali)
     <div class="col-md-3 col-sm-6">
     <div class="boxreal">
      <img src="{{asset('images/'.$reali->imagerealis)}}" class="bordimg" style="height: 200px;width:90%;">
          <h3 class="text-center"><a href="{{url('/realisations/'.$reali->id)}}">{{$reali->titre}}</a></h3>
          
     </div>
    </div>
     @endforeach
     <div class="clearfix"></div>
  </div>

   
</div>

<!-- end relaisations stagiaires news -->


<div class="vid">
<div class="backg"></div>
<video autoplay="autoplay" loop class="video">
<source src="{{asset('videos/backv.webm')}}" type="video/mp4">

</video>
<p class="p1 wow rotateInDownRight" data-wow-delay="1s">فرصتك السهلة للولوج إلى عالم الشغل</p>
<p class="p2 wow rotateInDownRight" data-wow-delay="2s">سارع بالانضمام إلى أسرتنا الكبيرة</p>


</div>

<!-- section actvites stagiaires -->
<div class="realisations">
  
   <h1 class="titre text-center">نشاطات المـــعهد</h1>
    <div class="row">

    @foreach($acts=\App\Activite::take(4)->get() as $act)
     <div class="col-md-3 col-sm-6" style="margin-bottom: 50px;">
     <div class="boxreal">
      <img src="{{asset('images/'.$act->image)}}" class="bordimg" style="height: 200px;width:90%;">
          <h3 class="text-center"><a href="{{url('/activites/'.$act->id)}}">{{$act->title}}</h3>
          
     </div></div>
     @endforeach
     
  </div>

   
</div>

<!-- end relaisations stagiaires news -->

</div>
<div class="col-sm-3">
<div class="derniernews">
<h1 class="text-center">آخر أخبار المعهد</h1>
@foreach($news=\App\Neww::get() as $new)
<div class="info">
<a href="{{url('/news/'.$new->id)}}"><img class="img-circle" src="{{asset('images/'.$new->image)}}" alt="" style="float:right;width:100px;height: 100px;margin-left: 20px"></a>
<h3 style="font-size: 20px;">{{$new->titre}}</h3>
<span class="clearfix"><i class="fa fa-clock-o"></i> {{date_format($new->created_at,'Y-m-d')}}</span>
</div>
@endforeach
</div>
</div>



</div>


</div>


</div>

<!-- end content -->

@endsection
