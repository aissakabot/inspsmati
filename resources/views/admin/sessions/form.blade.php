
                   
{{ csrf_field() }}

<div class="form-group{{ $errors->has('libelle') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('libelle',null,['class'=>'form-control']) !!}

        @if ($errors->has('libelle'))
            <span class="help-block">
                <strong>{{ $errors->first('libelle') }}</strong>
            </span>
        @endif
    </div>
    <label for="libelle" class="col-md-3 control-label">اسم الدورة</label>
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
    <label for="datedebut" class="col-md-3 control-label">اتاريخ بداية الدورة</label>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
