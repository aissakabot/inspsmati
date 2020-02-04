@extends('admin.layouts.main')
@section('title')
إضافة دورة جديد 
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
       أضافة دورة
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/sessions')}}">التحكم في الدورات</a></li>
        <li class="active"><a href="{{url('/adminpanel/sessions/create')}}">دورة جديدة  </a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف دورة جديدة</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['url'=>'/adminpanel/sessions/','method'=>'POST','class'=>'form-horizental']) !!}
           @include('admin.sessions.form')
           {!!  Form::close()!!}
            </div>
          </div>
        </div>
      </div>
</section>

@endsection    