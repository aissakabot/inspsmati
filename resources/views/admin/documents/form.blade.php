
                   
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
    <label for="libelle" class="col-md-3 control-label">عنوان الوثيقة</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('descrip') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::textarea('descrip',null,['class'=>'form-control','rows'=>'5']) !!}

        @if ($errors->has('descrip'))
            <span class="help-block">
                <strong>{{ $errors->first('descrip') }}</strong>
            </span>
        @endif
    </div>
    <label for="descrip" class="col-md-3 control-label">الوصف:</label>
    <div class="clearfix"></div>
</div>
@if(!isset($document))
<div class="form-group{{ $errors->has('fichier') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
     {!! Form::file('fichier',['class'=>'form-control']) !!}

        @if ($errors->has('fichier'))
            <span class="help-block">
                <strong>{{ $errors->first('fichier') }}</strong>
            </span>
        @endif
       </div>
    <label for="fichier" class="col-md-3 control-label">رفع المف:</label>
    <div class="clearfix"></div>

</div>
@endif
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
