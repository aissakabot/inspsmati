@extends('admin.layouts.main')
@section('title')
إضافة لجنة ةجديد
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
       أضافة لجنو
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/entreprise/comites')}}">التحكم في الجان</a></li>
        <li class="active"><a href="{{url('/adminpanel/entreprise/comites/create')}}">لجنة ةجديد</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف لجنة ةجديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['url'=>'/adminpanel/entreprise/comites/','method'=>'POST','class'=>'form-horizental','enctype'=>'multipart/form-data']) !!}
           @include('admin.comites.form')
           {!!  Form::close()!!}
            </div>
          </div>
        </div>
      </div>
</section>

@endsection    