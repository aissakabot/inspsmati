
                   
{{ csrf_field() }}
<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('type',typespecialite(),null,['class'=>'form-control']) !!}

        @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
    </div><label for="type" class="col-md-3 control-label">نوع التكوين</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('branchep') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('branchep',brancheprof(),null,['class'=>'form-control']) !!}

        @if ($errors->has('branchep'))
            <span class="help-block">
                <strong>{{ $errors->first('branchep') }}</strong>
            </span>
        @endif
    </div><label for="branchep" class="col-md-3 control-label">الشعبة المهنية</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('intitule') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('intitule',intitulespecialite(),null,['class'=>'form-control']) !!}

        @if ($errors->has('intitule'))
            <span class="help-block">
                <strong>{{ $errors->first('intitule') }}</strong>
            </span>
        @endif
    </div><label for="intitule" class="col-md-3 control-label">اسم التخصص</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('code',null,['class'=>'form-control']) !!}

        @if ($errors->has('code'))
            <span class="help-block">
                <strong>{{ $errors->first('code') }}</strong>
            </span>
        @endif
    </div>
    <label for="code" class="col-md-3 control-label">رمز التخصص</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('niveauqual') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('niveauqual',niveauqual(),null,['class'=>'form-control']) !!}

        @if ($errors->has('niveauqual'))
            <span class="help-block">
                <strong>{{ $errors->first('niveauqual') }}</strong>
            </span>
        @endif
    </div><label for="niveauqual" class="col-md-3 control-label">مستوى التأهيل</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('duree') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('duree',dureeform(),null,['class'=>'form-control']) !!}

        @if ($errors->has('duree'))
            <span class="help-block">
                <strong>{{ $errors->first('duree') }}</strong>
            </span>
        @endif
    </div><label for="duree" class="col-md-3 control-label">مدة التكوين</label>
    <div class="clearfix"></div>

</div>

<div class="form-group{{ $errors->has('volumeh') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('volumeh',volumeh(),null,['class'=>'form-control']) !!}

        @if ($errors->has('volumeh'))
            <span class="help-block">
                <strong>{{ $errors->first('volumeh') }}</strong>
            </span>
        @endif
    </div><label for="volumeh" class="col-md-3 control-label">الحجم الساعي</label>
    <div class="clearfix"></div>

</div>

<div class="form-group{{ $errors->has('diplome') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('diplome',diplome(),null,['class'=>'form-control']) !!}

        @if ($errors->has('diplome'))
            <span class="help-block">
                <strong>{{ $errors->first('diplome') }}</strong>
            </span>
        @endif
    </div><label for="diplome" class="col-md-3 control-label">الشهادة</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('conditionacc') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('conditionacc',conditionacc(),null,['class'=>'form-control']) !!}

        @if ($errors->has('volumeh'))
            <span class="help-block">
                <strong>{{ $errors->first('conditionacc') }}</strong>
            </span>
        @endif
    </div><label for="conditionacc" class="col-md-3 control-label">شروط الالتحاق</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('modep') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('modep',modepref(),null,['class'=>'form-control']) !!}

        @if ($errors->has('modep'))
            <span class="help-block">
                <strong>{{ $errors->first('modep') }}</strong>
            </span>
        @endif
    </div><label for="modep" class="col-md-3 control-label">النمط المفضل</label>
    <div class="clearfix"></div>

</div>






<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
