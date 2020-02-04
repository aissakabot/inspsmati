@extends('admin.layouts.main')
@section('title')
تعديل العمال
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل العضو {{ $cadre->name }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/entreprise/cadres')}}">التحكم في العمال</a></li>
        <li class="active"><a href="{{url('/adminpanel/entreprise/cadres/'.$cadre->id.'/edit')}}">تعديل العضو</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بيانات العضو {{$cadre->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($cadre,['route'=>['cadres.update',$cadre->id],'method'=>'PUT']) !!}
           @include('admin.cadres.form')
           {!! Form::close() !!}
           </form>
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
              <h3 class="box-title">تغيير صورة: {{$cadre->nom}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::open(['url'=>'/adminpanel/entreprise/cadres/changeimage','method'=>'POST','enctype'=>'multipart/form-data']) !!}
             <input type="hidden" name="cadre_id" value="{{$cadre->id}}">

            <div class="form-group{{ $errors->has('photo2') ? ' has-error' : '' }}">
    
    
    <div class="col-md-3">
      <button type="submit" class="btn btn-primary">
            تعديل الصورة
        </button>
    </div>
    </div>
    <div class=" col-md-9">
        <input id="photo2" type="file" class="form-control" name="photo2" required>

        @if ($errors->has('photo2'))
            <span class="help-block">
                <strong>{{ $errors->first('photo2') }}</strong>
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