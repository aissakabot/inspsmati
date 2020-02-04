
                   
{{ csrf_field() }}

<div class="form-group{{ $errors->has('nomins') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('nomins',null,['class'=>'form-control']) !!}

        @if ($errors->has('nomins'))
            <span class="help-block">
                <strong>{{ $errors->first('nomins') }}</strong>
            </span>
        @endif
    </div>
    <label for="nomins" class="col-md-3 control-label">الاسم:</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('prenomins') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('prenomins',null,['class'=>'form-control']) !!}

        @if ($errors->has('prenomins'))
            <span class="help-block">
                <strong>{{ $errors->first('prenomins') }}</strong>
            </span>
        @endif
    </div>
    <label for="prenomins" class="col-md-3 control-label">اللقب:</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('lieuins') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('lieuins',null,['class'=>'form-control']) !!}

        @if ($errors->has('lieuins'))
            <span class="help-block">
                <strong>{{ $errors->first('lieuins') }}</strong>
            </span>
        @endif
    </div>
    <label for="lieuins" class="col-md-3 control-label">مكان الميلاد:</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('dobins') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::date('dobins',null,['class'=>'form-control']) !!}

        @if ($errors->has('dobins'))
            <span class="help-block">
                <strong>{{ $errors->first('dobins') }}</strong>
            </span>
        @endif
    </div>
    <label for="dobins" class="col-md-3 control-label">اريخ الميلاد:</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('adrins') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('adrins',null,['class'=>'form-control']) !!}

        @if ($errors->has('adrins'))
            <span class="help-block">
                <strong>{{ $errors->first('adrins') }}</strong>
            </span>
        @endif
    </div>
    <label for="adrins" class="col-md-3 control-label">العنوان:</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('tel',null,['class'=>'form-control']) !!}

        @if ($errors->has('tel'))
            <span class="help-block">
                <strong>{{ $errors->first('tel') }}</strong>
            </span>
        @endif
    </div>
    <label for="tel" class="col-md-3 control-label">رقم الهاتف:</label>
    <div class="clearfix"></div>
</div>


<div class="form-group{{ $errors->has('niveauins') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('niveauins',conditionacc(),null,['class'=>'form-control']) !!}

        @if ($errors->has('niveauins'))
            <span class="help-block">
                <strong>{{ $errors->first('niveauins') }}</strong>
            </span>
        @endif
    </div><label for="niveauins" class="col-md-3 control-label">المستوى الدراسي:</label>
    <div class="clearfix"></div>

</div>

<div class="form-group{{ $errors->has('special') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('special',listespecial(),null,['class'=>'form-control']) !!}

        @if ($errors->has('special'))
            <span class="help-block">
                <strong>{{ $errors->first('special') }}</strong>
            </span>
        @endif
    </div><label for="special" class="col-md-3 control-label">التخصص المرغوب:</label>
    <div class="clearfix"></div>

</div>
<hr>
<h2 class="text-center">بيانات التسجيل</h2>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('email',null,['placeholder'=>' الرجاء ادخال بريد إن وجد ..','class'=>'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <label for="email" class="col-md-3 control-label">البريد الإلكتروني:</label>
    <div class="clearfix"></div>
</div>


<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::password('password',['class'=>'form-control']) !!}

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <label for="password" class="col-md-3 control-label">كلمة المرور:</label>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
