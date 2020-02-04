
                   
{{ csrf_field() }}

<div class="form-group{{ $errors->has('libelle') ? ' has-error' : '' }}">
    

    <div class="col-md-6">
        {!! Form::text('libelle',null,['class'=>'form-control']) !!}

        @if ($errors->has('libelle'))
            <span class="help-block">
                <strong>{{ $errors->first('libelle') }}</strong>
            </span>
        @endif
    </div>
    <label for="libelle" class="col-md-4 control-label">الإسم</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('descrip') ? ' has-error' : '' }}">
   

    <div class="col-md-6">
        {!! Form::textarea('descrip',null,['class'=>'form-control']) !!}

        @if ($errors->has('descrip'))
            <span class="help-block">
                <strong>{{ $errors->first('descrip') }}</strong>
            </span>
        @endif
    </div> 
    <label for="descrip" class="col-md-4 control-label">الوصف:</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('membres') ? ' has-error' : '' }}">
   

    <div class="col-md-6">
        {!! Form::textarea('membres',null,['class'=>'form-control']) !!}

        @if ($errors->has('membres'))
            <span class="help-block">
                <strong>{{ $errors->first('membres') }}</strong>
            </span>
        @endif
    </div> 
    <label for="membres" class="col-md-4 control-label">الأعضاء:</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('datedebut') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::date('datedebut',null,['class'=>'form-control']) !!}

        @if ($errors->has('datedebut'))
            <span class="help-block">
                <strong>{{ $errors->first('datedebut') }}</strong>
            </span>
        @endif
    </div>
    <label for="datedebut" class="col-md-3 control-label">تاريخ البداية</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('datefin') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::date('datefin',null,['class'=>'form-control']) !!}

        @if ($errors->has('datefin'))
            <span class="help-block">
                <strong>{{ $errors->first('datefin') }}</strong>
            </span>
        @endif
    </div>
    <label for="datefin" class="col-md-3 control-label">تاريخ النهاية</label>
    <div class="clearfix"></div>
</div>datedebut





@if(!isset($comite))
<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
     {!! Form::file('image',['class'=>'form-control']) !!}

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
       </div>
    <label for="image" class="col-md-3 control-label">صورة اللجنة</label>
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
