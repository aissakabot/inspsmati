@extends('admin.layouts.main')
@section('title')تعديل بيلنات المقاييس المدروسة
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل المقياس {{ $module->libelle }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/modules')}}">التحكم في المقاييس</a></li>
        <li class="active"><a href="{{url('/adminpanel/modules/'.$module->id.'/edit')}}">تعديل المقياس</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بيانات المقياس الخاص ب:{{$module->libelle}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($module,['route'=>['modules.update',$module->id],'method'=>'PUT']) !!}
           @include('admin.modules.form')
           {!! Form::close() !!}
           </form>
            </div>
          </div>
        </div>
      </div>
</section>



@endsection    