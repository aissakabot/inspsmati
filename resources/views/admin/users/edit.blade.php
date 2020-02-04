@extends('admin.layouts.main')
@section('title')
إضافة عضو جديد
@endsection
@section('style')
@endsection

@section('content')
<section class="content-header">
      <h1>
      تعديل العضو {{ $user->name }}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/adminpanel')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
        <li ><a href="{{url('/adminpanel/users')}}">التحكم في الأعضاء</a></li>
        <li class="active"><a href="{{url('/adminpanel/users/'.$user->id.'/edit')}}">تعديل العضو</a></li>
        
      </ol>
    </section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">تعديل بيانات العضو {{$user->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::Model($user,['route'=>['users.update',$user->id],'method'=>'PUT']) !!}
           @include('admin.users.form')
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
              <h3 class="box-title">تغيير كلمة المرور {{$user->name}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             {!! Form::open(['url'=>'/adminpanel/users/changepassword','method'=>'POST']) !!}
             <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    
     <div class="form-group">
    <div class="col-md-3">
        @if($user->id != 1)
        <a href="{{url('/adminpanel/users/'.$user->id.'/delete')}}"class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>
        @endif
        <button type="submit" class="btn btn-primary">
            تعديل كلمة المرور
        </button>
    </div>
</div>
    <div class=" col-md-9">
        <input id="password" type="password" class="form-control" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
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