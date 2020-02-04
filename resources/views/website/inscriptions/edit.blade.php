@extends('layouts.main')
@section('title')تعديل بيلنات التسجيل ال,لي
@endsection
@section('style')
<style type="text/css">
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
<div class="edit-inscrit">
<section class="content-header ">
      
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/inscriptions')}}">التحكم في التسجيلات الولية</a></li>
        <li class="active"><a href="{{url('/inscriptions/'.$inscrit->id.'/edit')}}">تعديل التسجيل</a></li>
        
      </ol>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h1 class="box-title">تعديل بيانات التسجيل الخاص ب:{{$inscrit->nomins}}</h1>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($inscrit,['route'=>['inscrits.update',$inscrit->id],'method'=>'PUT']) !!}
           @include('website.inscriptions.form')
           {!! Form::close() !!}
           
            </div>
          </div>
        </div>
      </div>
</section>

<div class="changepassword" style="background-color: #fff">
        
    <h1 class="box-title">تغيير كلمة المرور {{$inscrit->nomins}}</h1>
                
    {!! Form::open(['url'=>'inscriptions/changepassword','method'=>'POST']) !!}
     <input type="hidden" name="inscrit_id" value="{{$inscrit->id}}">
  <div class="row">
  <div class=" col-md-9">
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    </div>
     <div class="col-md-3">
      
        <button type="submit" class="btn btn-primary">
            تعديل كلمة المرور
        </button>
    </div>

    
    </div>
    {!! Form::close() !!}
</div>
</div>
@endsection    