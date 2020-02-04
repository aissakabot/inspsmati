@extends('admin.layouts.main')
@section('title')تعديل بيلنات لالتخصص
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل الإنجاز {{ $specialite->intitule }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/specialites')}}">التحكم في التخصصات</a></li>
        <li class="active"><a href="{{url('/adminpanel/specialites/'.$specialite->id.'/edit')}}">تعديل التخصص</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بيانات التخصص{{$specialite->intitule}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($specialite,['route'=>['specialites.update',$specialite->id],'method'=>'PUT']) !!}
           @include('admin.specialites.form')
           {!! Form::close() !!}
           </form>
            </div>
          </div>
        </div>
      </div>
</section>



@endsection    