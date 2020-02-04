@extends('admin.layouts.main')
@section('title')
 إعدادات الموقع
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      إعدادات الموقع
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/settings')}}">إعدادات الموقع</a></li>
        <li class="active"><a href="#">إعدادات أخرى</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"> إعدادات الموقع</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <form action="{{url('adminpanel/sitesettings')}}" method="POSt">
            {!! csrf_field() !!}
             @foreach($settings as $setting)
             <div class="form-group{{ $errors->has($setting->namesetting) ? ' has-error' : '' }}">
    
    <div class="col-md-10">
    @if($setting->type == 0)
    {!! Form::text($setting->namesetting,$setting->value,['class'=>'form-control']) !!}
    @else
  {!! Form::textarea($setting->namesetting,$setting->value,['class'=>'form-control']) !!}
    @endif
        @if ($errors->has($setting->namesetting))
            <span class="help-block">
                <strong>{{ $errors->first($setting->namesetting)}}</strong>
            </span>
        @endif
    </div>
    <label for="{{$setting->namesetting}}" class="col-md-2 control-label">{{$setting->slug}}</label>
    <div class="clearfix"></div>
</div>
@endforeach
<button name="submit" class="btn btn-app"><i class="fa fa-save"></i>حفظ الإعدادات</button>

            </div>
          </div>
        </div>
      </div>
</section>

@endsection    