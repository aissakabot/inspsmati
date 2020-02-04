
                   
{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-md-4 control-label">الإسم</label>

    <div class="col-md-6">
        {!! Form::text('name',null,['class'=>'form-control']) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
    <label for="admin" class="col-md-4 control-label">الصلاحيات</label>

    <div class="col-md-6">
        {!! Form::select('admin',["0"=>"user","1"=>"admin","2"=>"prof","4"=>"gerant"],null,['class'=>'form-control']) !!}

        @if ($errors->has('admin'))
            <span class="help-block">
                <strong>{{ $errors->first('admin') }}</strong>
            </span>
        @endif
    </div>
    <div class="clearfix"></div>

</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-md-4 control-label">البريد الإلكتروني</label>

    <div class="col-md-6">
        {!! Form::text('email',null,['class'=>'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="clearfix"></div>
</div>
@if(!isset($user))
<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <label for="password" class="col-md-4 control-label">كلمة المرور</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control" name="password" >

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <label for="password-confirm" class="col-md-4 control-label">تأكيد كلمة المرور</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
    </div>
</div>
@endif
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            تسجيل
        </button>
    </div>
</div>
