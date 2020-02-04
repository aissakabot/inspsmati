
                   


<div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('titre',null,['class'=>'form-control']) !!}

        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('titre') }}</strong>
            </span>
        @endif
    </div>
    <label for="titre" class="col-md-3 control-label">العنوان</label>
    <div class="clearfix"></div>
</div>



<div class="form-group{{ $errors->has('texte') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::textarea('texte',null,['rows'=>5, 'class'=>'form-control']) !!}

        @if ($errors->has('texte'))
            <span class="help-block">
                <strong>{{ $errors->first('texte') }}</strong>
            </span>
        @endif
    </div>
    <label for="texte" class="col-md-3 control-label">نص السلايد</label>
    <div class="clearfix"></div>
</div>
<br>



@if(!isset($slide))
<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
       <input type="file" id="image" name="image">

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <label for="image" class="col-md-3 control-label">صورة السلايد</label>
    <div class="clearfix"></div>

</div>
@endif
<div class="form-group{{ $errors->has('button') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('button',null,['class'=>'form-control']) !!}

        @if ($errors->has('button'))
            <span class="help-block">
                <strong>{{ $errors->first('button') }}</strong>
            </span>
        @endif
    </div>
    <label for="button" class="col-md-3 control-label">button</label>
    <div class="clearfix"></div>

</div>



<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
