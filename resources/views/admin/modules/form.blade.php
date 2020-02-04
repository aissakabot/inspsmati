
                   
{{ csrf_field() }}
<div class="form-group{{ $errors->has('special_id') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('special_id',listespecial(),null,['class'=>'form-control']) !!}

        @if ($errors->has('special_id'))
            <span class="help-block">
                <strong>{{ $errors->first('niveauins') }}</strong>
            </span>
        @endif
    </div><label for="special_id" class="col-md-3 control-label">اختر التخصص:</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('libelle') ? ' has-error' : '' }}">
    <div class="col-md-7">
        {!! Form::text('libelle',null,['class'=>'form-control']) !!}

        @if ($errors->has('libelle'))
            <span class="help-block">
                <strong>{{ $errors->first('libelle') }}</strong>
            </span>
        @endif
    </div>
    <label for="libelle" class="col-md-3 control-label">اسم المقياس:</label>
    <div class="clearfix"></div>
</div>






<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
