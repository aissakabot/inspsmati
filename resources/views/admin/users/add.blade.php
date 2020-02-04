@extends('admin.layouts.main')
@section('title')
إضافة عضو جديد
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
       أضافة عضو
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/users')}}">التحكم في الأعضاء</a></li>
        <li class="active"><a href="{{url('/adminpanel/users/create')}}">عضو جديد</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف عضو جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['url'=>'/adminpanel/users/','method'=>'POST','class'=>'form-horizental']) !!}
           @include('admin.users.form')
           {!!  Form::close()!!}
            </div>
          </div>
        </div>
      </div>
</section>

@endsection    