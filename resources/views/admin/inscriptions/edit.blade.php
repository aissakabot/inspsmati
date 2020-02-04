@extends('admin.layouts.main')
@section('title')تعديل بيلنات التسجيل ال,لي
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل الإنجاز {{ $inscrit->nomins }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/inscriptions')}}">التحكم في التسجيلات الولية</a></li>
        <li class="active"><a href="{{url('/adminpanel/inscriptions/'.$inscrit->id.'/edit')}}">تعديل التسجيل</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بيانات التسجيل الخاص ب:{{$inscrit->nomins}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($inscrit,['route'=>['inscriptions.update',$inscrit->id],'method'=>'PUT']) !!}
           @include('admin.inscriptions.form')
           {!! Form::close() !!}
          
            </div>
          </div>
        </div>
      </div>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">إضافة رقم التسجيل الخص ب:{{$inscrit->nomins}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

             {!! Form::open(['url'=>'/adminpanel/inscriptions/confirmation/'.$inscrit->id,'method'=>'POST']) !!}
             <input type="hidden" name="inscrit_id" value="{{$inscrit->id}}">

            <div class="form-group{{ $errors->has('numins') ? ' has-error' : '' }}">
    
    
    <div class="col-md-3">
      <button type="submit" class="btn btn-primary">
           إضافة
        </button>
    </div>
    </div>
    <div class=" col-md-9">
        <input  type="text" class="form-control" name="numins" required>

        @if ($errors->has('numins'))
            <span class="help-block">
                <strong>{{ $errors->first('numins') }}</strong>
            </span>
        @endif
    </div>
    <div class="clearfix"></div>
     </div>
           {!! Form::close() !!}
          
            </div>
          </div>
        </div>
      </div>
</section>


@endsection    