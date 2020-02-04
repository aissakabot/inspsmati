@extends('admin.layouts.main')
@section('title')تعديل الوثائق
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل الإنجاز {{ $document->libelle }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/documents')}}">التحكم في الوثائق</a></li>
        <li class="active"><a href="{{url('/adminpanel/documents/'.$document->id.'/edit')}}">تعديل الوثائق</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بيانات الوثيقة:{{$document->libelle}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($document,['route'=>['documents.update',$document->id],'method'=>'PUT']) !!}
           @include('admin.documents.form')
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
              <h3 class="box-title">تغيير صورة: {{$document->libelle}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::open(['url'=>'/adminpanel/documents/changeimage','method'=>'POST','enctype'=>'multipart/form-data']) !!}
             <input type="hidden" name="document_id" value="{{$document->id}}">

            <div class="form-group{{ $errors->has('fich') ? ' has-error' : '' }}">
    
    
    <div class="col-md-3">
        
        
       
        <button type="submit" class="btn btn-primary">
            تعديل الصورة
        </button>
    </div>
</div>
    <div class=" col-md-9">
        <input id="fich" type="file" class="form-control" name="fich" required>

        @if ($errors->has('fich'))
            <span class="help-block">
                <strong>{{ $errors->first('fich') }}</strong>
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