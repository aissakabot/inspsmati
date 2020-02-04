@extends('admin.layouts.main')
@section('title')تعديل بيلنات عرض التكوين
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل العرض {{ $offre->id }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/offres')}}">التحكم في العروض</a></li>
        <li class="active"><a href="{{url('/adminpanel/offres/'.$offre->id.'/edit')}}">تعديل العرض</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بيانات العرض{{$offre->id}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($offre,['route'=>['offres.update',$offre->id],'method'=>'PUT']) !!}
           @include('admin.offres.form')
           {!! Form::close() !!}
           </form>
            </div>
          </div>
        </div>
      </div>
</section>



@endsection    