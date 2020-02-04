@extends('admin.layouts.main')
@section('title')
إضافة عرض تكوين جديد 
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
       أضافة عرض تكزوين
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/offres')}}">التحكم في العروض</a></li>
        <li class="active"><a href="{{url('/adminpanel/offres/create')}}">عرض جديد </a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">أضف عرض جديد</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              {!! Form::open(['url'=>'/adminpanel/offres/','method'=>'POST','class'=>'form-horizental']) !!}
           @include('admin.offres.form')
           {!!  Form::close()!!}
            </div>
          </div>
        </div>
      </div>
</section>

@endsection    