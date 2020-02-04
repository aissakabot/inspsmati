@extends('admin.layouts.main')
@section('title')تعديل بيلنات التخصص و المقاييس
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل المقياس {{ $modulespecial->libelle }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/modulespecialites')}}">التحكم فيالتخصص و المقاييس</a></li>
        <li class="active"><a href="{{url('/adminpanel/modulespecialites/'.$modulespecial->id.'/edit')}}">تعديل التخصص و المقاييس</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بياناتالتخصص و المقاييس الخاص ب:{{$modulespecial->module_id}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($modulespecial,['route'=>['modulespecialites.update',$modulespecial->id],'method'=>'PUT']) !!}
           @include('admin.modulespecialites.form')
           {!! Form::close() !!}
           </form>
            </div>
          </div>
        </div>
      </div>
</section>



@endsection    