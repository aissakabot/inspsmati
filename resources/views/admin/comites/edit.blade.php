@extends('admin.layouts.main')
@section('title')
تعديل اللجنة
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل اللجنة {{ $comite->libelle }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/entreprise/comites')}}">التحكم في اللجان</a></li>
        <li class="active"><a href="{{url('/adminpanel/entreprise/comites/'.$comite->id.'/edit')}}">تعديل لجنة</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بيانات اللجنة {{$comite->libelle}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($comite,['route'=>['comites.update',$comite->id],'method'=>'PUT']) !!}
           @include('admin.comites.form')
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
              <h3 class="box-title">تغيير صورة: {{$comite->libelle}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::open(['url'=>'/adminpanel/entreprise/comites/changeimage','method'=>'POST','enctype'=>'multipart/form-data']) !!}
             <input type="hidden" name="comite_id" value="{{$comite->id}}">

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