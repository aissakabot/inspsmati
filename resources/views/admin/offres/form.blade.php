
                   
{{ csrf_field() }}


<div class="form-group{{ $errors->has('codesession') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('codesession',listesession(),null,['class'=>'form-control']) !!}

        @if ($errors->has('codesession'))
            <span class="help-block">
                <strong>{{ $errors->first('codesession') }}</strong>
            </span>
        @endif
    </div><label for="codesession" class="col-md-3 control-label">الدورة</label>
    <div class="clearfix"></div>

</div>


<div class="form-group{{ $errors->has('codespecial') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('codespecial',listespecial(),null,['class'=>'form-control']) !!}

        @if ($errors->has('codespecial'))
            <span class="help-block">
                <strong>{{ $errors->first('codespecial') }}</strong>
            </span>
        @endif
    </div><label for="codespecial" class="col-md-3 control-label">التخصص</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('typeoffre') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('typeoffre',typeoffre(),null,['class'=>'form-control']) !!}

        @if ($errors->has('typeoffre'))
            <span class="help-block">
                <strong>{{ $errors->first('typeoffre') }}</strong>
            </span>
        @endif
    </div><label for="typeoffre" class="col-md-3 control-label">نمط العرض</label>
    <div class="clearfix"></div>

</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
