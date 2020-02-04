@extends('admin.layouts.main')
@section('title')
إضافة معلومات التخصص و المقاييس جديد 
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
       أضافة تسجيل أولي
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/')}}">التحكم في التخصص و المقاييس</a></li>
        <li class="active"><a href="{{url('/adminpanel/modulespecialites/create')}}">التخصص و المقاييس جديد </a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف التخصص و المقاييس جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['url'=>'/adminpanel/modulespecialites/','method'=>'POST','class'=>'form-horizental']) !!}
           @include('admin.modulespecialites.form')
           {!!  Form::close()!!}
            </div>
          </div>
        </div>
      </div>
</section>

@endsection    