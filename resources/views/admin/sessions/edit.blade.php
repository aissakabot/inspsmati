@extends('admin.layouts.main')
@section('title')تعديل بيلنات الدورة
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل الإنجاز {{ $ses->libelle }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/sessions')}}">التحكم في الدورات</a></li>
        <li class="active"><a href="{{url('/adminpanel/sessions/'.$ses->id.'/edit')}}">تعديل دورة</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بيانات الدورة{{$ses->libelle}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($ses,['route'=>['sessions.update',$ses->id],'method'=>'PUT']) !!}
           @include('admin.sessions.form')
           {!! Form::close() !!}
           </form>
            </div>
          </div>
        </div>
      </div>
</section>



@endsection    