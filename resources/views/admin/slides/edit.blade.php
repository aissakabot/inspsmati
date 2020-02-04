@extends('admin.layouts.main')
@section('title')تعديل السلايد
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل السلايد {{ $slide->titre }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/slides')}}">التحكم في السلايدات</a></li>
        <li class="active"><a href="{{url('/adminpanel/slides/'.$slide->id.'/edit')}}">تعديل السلايد</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل السلايد{{$slide->title}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($slide,['route'=>['slides.update',$slide->id],'method'=>'PUT']) !!}
           @include('admin.slides.form')
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
              <h3 class="box-title">تغيير صورة: {{$slide->titre}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::open(['url'=>'/adminpanel/slides/changeimage','method'=>'POST','enctype'=>'multipart/form-data']) !!}
             <input type="hidden" name="slide_id" value="{{$slide->id}}">

            <div class="form-group{{ $errors->has('image2') ? ' has-error' : '' }}">
    
    
    <div class="col-md-3">
        
        
       
        <button type="submit" class="btn btn-primary">
            تعديل الصورة
        </button>
    </div>
</div>
    <div class=" col-md-9">
        <input id="image2" type="file" class="form-control" name="image2" required>

        @if ($errors->has('imag2'))
            <span class="help-block">
                <strong>{{ $errors->first('image2') }}</strong>
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