
                   
{{ csrf_field() }}

<div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
    

    <div class="col-md-6">
        {!! Form::text('nom',null,['class'=>'form-control']) !!}

        @if ($errors->has('nom'))
            <span class="help-block">
                <strong>{{ $errors->first('nom') }}</strong>
            </span>
        @endif
    </div>
    <label for="nom" class="col-md-4 control-label">الإسم</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('prenom') ? ' has-error' : '' }}">
   

    <div class="col-md-6">
        {!! Form::text('prenom',null,['class'=>'form-control']) !!}

        @if ($errors->has('prenom'))
            <span class="help-block">
                <strong>{{ $errors->first('prenom') }}</strong>
            </span>
        @endif
    </div> 
    <label for="prenom" class="col-md-4 control-label">اللقب</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    

    <div class="col-md-6">
        {!! Form::select('type',typeCadre(),null,['class'=>'form-control']) !!}

        @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
    </div>
    <label for="type" class="col-md-4 control-label">القسم</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('prof') ? ' has-error' : '' }}">
    

    <div class="col-md-6">
        {!! Form::text('prof',null,['class'=>'form-control']) !!}

        @if ($errors->has('prof'))
            <span class="help-block">
                <strong>{{ $errors->first('prof') }}</strong>
            </span>
        @endif
    </div>
    <label for="prof" class="col-md-4 control-label">المهنة</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('datenomin') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::date('datenomin',null,['class'=>'form-control']) !!}

        @if ($errors->has('datenomin'))
            <span class="help-block">
                <strong>{{ $errors->first('datenomin') }}</strong>
            </span>
        @endif
    </div>
    <label for="datenomin" class="col-md-3 control-label">تاريخ التوظيف</label>
    <div class="clearfix"></div>
</div>



<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    

    <div class="col-md-6">
        {!! Form::text('email',null,['class'=>'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <label for="email" class="col-md-4 control-label">البريد الإلكتروني</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('faceb') ? ' has-error' : '' }}">
   

    <div class="col-md-6">
        {!! Form::text('faceb',null,['class'=>'form-control']) !!}

        @if ($errors->has('faceb'))
            <span class="help-block">
                <strong>{{ $errors->first('faceb') }}</strong>
            </span>
        @endif
    </div> 
    <label for="faceb" class="col-md-4 control-label">البريد حساب الفيسبوك</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('tel') ? ' has-error' : '' }}">
   

    <div class="col-md-6">
        {!! Form::text('tel',null,['class'=>'form-control']) !!}

        @if ($errors->has('tel'))
            <span class="help-block">
                <strong>{{ $errors->first('tel') }}</strong>
            </span>
        @endif
    </div> 
    <label for="tel" class="col-md-4 control-label">رقم الهاتف</label>
    <div class="clearfix"></div>
</div>


@if(!isset($cadre))
<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
     {!! Form::file('image',['class'=>'form-control']) !!}

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
       </div>
    <label for="image" class="col-md-3 control-label">صورة العامل</label>
    <div class="clearfix"></div>

</div>
@endif
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            تسجيل
        </button>
    </div>
</div>
