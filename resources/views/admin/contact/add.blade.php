@extends('admin.layouts.main')
@section('title')
إضافة إنجاز جديد جديد
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
       أضافة إنجاز
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/realisations')}}">التحكم في الإنجازات</a></li>
        <li class="active"><a href="{{url('/adminpanel/realisations/create')}}">إنجاز جديد </a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف إنجاز جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['url'=>'/adminpanel/realisations/','method'=>'POST','class'=>'form-horizental','enctype'=>'multipart/form-data']) !!}
           @include('admin.realisations.form')
           {!!  Form::close()!!}
            </div>
          </div>
        </div>
      </div>
</section>

@endsection    