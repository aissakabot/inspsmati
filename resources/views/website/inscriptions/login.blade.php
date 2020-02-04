@extends('layouts.main')
@section('title')
تعديل بيانات التسجيل  
@endsection
@section('style')
@endsection

@section('content')
<h2 class="text-center">بيانات التسجيل</h2>

{!! Form::open(['url'=>'inscriptions/login','method'=>'POST','class'=>'form-horizental']) !!}
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
   
<label for="email" class="col-md-3 control-label">البريد الإلكتروني:</label>
    <div class="col-md-7">
        {!! Form::text('email',null,['placeholder'=>' الرجاء ادخال بريد إلكتروني ..','class'=>'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
   
<label for="password" class="col-md-3 control-label">كلمة المرور:</label>
    <div class="col-md-7">
        {!! Form::password('password',['class'=>'form-control']) !!}

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="col-md-3 ">
        <button type="submit" class="btn btn-primary">
            دخول
        </button>
        
    </div>
   <div class="col-md-3">
   
       <span> <a href="{{url('inscrit_password/reset')}}">نسيت كلمة المرور؟</a></span>
         <span> <a href="{{url('/inscriptions')}}">تسجيل أولي جديد</a></span>
   </div>
   <div class="clearfix"></div>
    </div>
    <br>
@if (session('status'))
                    <div class="alert alert-warning">
                        {{ session('status') }}
                    </div>
                @endif

{!! Form::close() !!}
@endsection