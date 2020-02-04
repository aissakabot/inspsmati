@extends('admin.layouts.main')
@section('title')تعديل نتيجة المتلربص
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل الإنجاز {{ $result->numinscrit }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/results')}}">التحكم في بيانات المتلابصين</a></li>
        <li class="active"><a href="{{url('/adminpanel/results/'.$result->id.'/edit')}}">تعديل نتيجة المتريص</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل نتيجة المتلابص:{{$result->numinscrit}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($result,['route'=>['results.update',$result->id],'method'=>'PUT']) !!}
           @include('admin.resultats.form')
           {!! Form::close() !!}
           </form>
            </div>
          </div>
        </div>
      </div>
</section>



@endsection    