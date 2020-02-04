@extends('admin.layouts.main')
@section('title')
إضافة سلايد جديد 
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
       أضافة سلايد
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/slides')}}">التحكم في لسلايدات</a></li>
        <li class="active"><a href="{{url('/adminpanel/slides/create')}}">سلايد جديد </a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف سلايد جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['url'=>'/adminpanel/slides/','method'=>'POST','class'=>'form-horizental','enctype'=>'multipart/form-data']) !!}
           @include('admin.slides.form')
           {!!  Form::close()!!}
            </div>
          </div>
        </div>
      </div>
</section>

@endsection    