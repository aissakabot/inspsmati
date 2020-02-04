
@extends('admin.layouts.main')
@section('title')
إضافة عامل جديد
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
       أضافة وثيقة
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/documents')}}">التحكم في الوثائق</a></li>
        <li class="active"><a href="{{url('/adminpanel/documents/create')}}">وثيقة  ةجديد</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف وثيقة وجديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['url'=>'/adminpanel/documents','method'=>'POST','class'=>'form-horizental','enctype'=>'multipart/form-data']) !!}
              @include('admin.documents.form')
           {!!  Form::close()!!}
            </div>
          </div>
        </div>
      </div>
</section>

@endsection    





