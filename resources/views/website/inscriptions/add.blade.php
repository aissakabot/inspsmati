@extends('layouts.main')
@section('title')
إضافة تسجيل أولي جديد 
@endsection
@section('style')
<style type="text/css">
  .box p{
    line-height: 2;
    font-size: 16px;
    font-weight: bold;
   
    padding:20px;
    background-color: #fff;

  }
  .openinscrit{
    text-align: center;
  }
  .openinscrit button{
    font-weight: bold;
    width: 250px;
    color:#000;
  }
  .openinscrit button:hover{
    background-color: #000;
    color: #11b7e6;
  }
  p a{
    color: #11b7e6;
    font-size: 18x;
    text-decoration: none;
  }
  p a :hover{
    color:red;
    text-decoration: underline;
  }
  select{
    font-size: 14px;
    font-weight: bold;
   display: block;
    height: 50px;
  }
  input:focus , select:focus{
background-color: #fff;
  }
</style>
@endsection

@section('content')
<section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-home"></i> الرئيسية</a></li>
        <li ><a href="{{url('/inscriptions')}}">التحكم في التسجيلات الأولية</a></li>
        <li class="active"><a href="{{url('/inscriptions/create')}}">تسجيل جديد </a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="text-center">عروض دورة <span style="color:red">{{$session->libelle}}</h3>

              <p class="col-sm-8 col-sm-offset-2">  مرحبا يك أخي طالب التكوبن الجديد سعدنا بك في خدمة التسجيل الإلكتروني بالمعهد.<br>
قبل البدء في عملية التسجيل يرجى الاطلاع على قائمة عروض <br>
 التكوين المخصصة لهذه الدورة <a href="{{url('/offres')}}">من هنا</a> مع مراعاة شروط الالتحاق بكل تخصص</p>
 
 <div class="clearfix"></div>
 <div class="openinscrit"><button  data-toggle="collapse" data-target="#inscriptions" class="btn btn-info">ابدأ عملية التسجيل</button></div>
            </div>
            <!-- /.box-header -->
            <div class="box-body collapse" id="inscriptions">
            <div class="infoinscrit">
             {!! Form::open(['url'=>'/inscriptions/','method'=>'POST','class'=>'form-horizental']) !!}
           @include('website.inscriptions.form')
           {!!  Form::close()!!}
            </div>
            </div>

            <div class="col-sm-8 col-sm-offset-2" style="background-color: #fff;font-size: bold;margin-top: 10px;">
            يتكون ملف التسجيل من الوثائق التالية:<br>
            <ul>
<li>شهادة مدرسية تثبت المستوى المطلوب</li>
<li>شهادة ميلاد</li>
<li>2 صورة شمسية</li>
<li>ظرفان برديان عليهما عنوان المترشح</li>
</ul>
 </div>
          </div>
        </div>
      </div>
</section>

@endsection    