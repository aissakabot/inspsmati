
                   
{{ csrf_field() }}

<div class="form-group{{ $errors->has('numinscrit') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('numinscrit',null,['class'=>'form-control']) !!}

        @if ($errors->has('nomins'))
            <span class="help-block">
                <strong>{{ $errors->first('numinscrit') }}</strong>
            </span>
        @endif
    </div>
    <label for="numinscrit" class="col-md-3 control-label">رقم التسجيل</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('nom',null,['class'=>'form-control']) !!}

        @if ($errors->has('nom'))
            <span class="help-block">
                <strong>{{ $errors->first('nom') }}</strong>
            </span>
        @endif
    </div>
    <label for="nom" class="col-md-3 control-label">اللقب:</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('prenom',null,['class'=>'form-control']) !!}

        @if ($errors->has('prenom'))
            <span class="help-block">
                <strong>{{ $errors->first('prenom') }}</strong>
            </span>
        @endif
    </div>
    <label for="prenom" class="col-md-3 control-label">الاسم</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('soum') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('soum',['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'],null,['class'=>'form-control']) !!}

        @if ($errors->has('soum'))
            <span class="help-block">
                <strong>{{ $errors->first('soum') }}</strong>
            </span>
        @endif
    </div><label for="soum" class="col-md-3 control-label">السداسي:</label>
    <div class="clearfix"></div>

</div>


<div class="form-group{{ $errors->has('specialite') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('specialite',listespecial(),null,['class'=>'form-control']) !!}

        @if ($errors->has('specialite'))
            <span class="help-block">
                <strong>{{ $errors->first('specialite') }}</strong>
            </span>
        @endif
    </div><label for="specialite" class="col-md-3 control-label">التخصص:</label>
    <div class="clearfix"></div>

</div>

<div class="form-group{{ $errors->has('moy_sun') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('moy_sun',null,['placeholder'=>' الرجاء ادخال بريد إن وجد ..','class'=>'form-control']) !!}

        @if ($errors->has('moy_sun'))
            <span class="help-block">
                <strong>{{ $errors->first('moy_sun') }}</strong>
            </span>
        @endif
    </div>
    <label for="moy_sun" class="col-md-3 control-label">معدل الشامل:</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('res_sun') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('res_sun',null,['placeholder'=>' الرجاء ادخال بريد إن وجد ..','class'=>'form-control']) !!}

        @if ($errors->has('res_sun'))
            <span class="help-block">
                <strong>{{ $errors->first('res_sun') }}</strong>
            </span>
        @endif
    </div>
    <label for="res_sun" class="col-md-3 control-label">نتيجة الشامل:</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('moy_ratt') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('moy_ratt',null,['placeholder'=>' الرجاء ادخال بريد إن وجد ..','class'=>'form-control']) !!}

        @if ($errors->has('moy_ratt'))
            <span class="help-block">
                <strong>{{ $errors->first('moy_ratt') }}</strong>
            </span>
        @endif
    </div>
    <label for="moy_ratt" class="col-md-3 control-label">معدل الاستدراكي:</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('res_ratt') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('res_ratt',null,['placeholder'=>' الرجاء ادخال بريد إن وجد ..','class'=>'form-control']) !!}

        @if ($errors->has('res_ratt'))
            <span class="help-block">
                <strong>{{ $errors->first('res_ratt') }}</strong>
            </span>
        @endif
    </div>
    <label for="res_ratt" class="col-md-3 control-label">نتيجة الاستدراكي:</label>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
