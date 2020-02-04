
                   
{{ csrf_field() }}



<div class="form-group{{ $errors->has('special') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('special',listespecial(),null,['class'=>'form-control','id'=>'special']) !!}

        @if ($errors->has('special'))
            <span class="help-block">
                <strong>{{ $errors->first('special') }}</strong>
            </span>
        @endif
    </div><label for="special" class="col-md-3 control-label">العنوان</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('module') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('module',[],null,['class'=>'form-control','id'=>'module']) !!}

        @if ($errors->has('module'))
            <span class="help-block">
                <strong>{{ $errors->first('module') }}</strong>
            </span>
        @endif
    </div><label for="special" class="col-md-3 control-label">المقياس</label>
    <div class="clearfix"></div>

</div>

<div class="form-group{{ $errors->has('titre') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('titre',null,['class'=>'form-control']) !!}

        @if ($errors->has('titre'))
            <span class="help-block">
                <strong>{{ $errors->first('titre') }}</strong>
            </span>
        @endif
    </div>
    <label for="titre" class="col-md-3 control-label">العنوان</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('descrip') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::textarea('descrip',null,['rows'=>5, 'class'=>'form-control']) !!}

        @if ($errors->has('descrip'))
            <span class="help-block">
                <strong>{{ $errors->first('descrip') }}</strong>
            </span>
        @endif
    </div>
    <label for="decrip" class="col-md-3 control-label">شرح بسيط:</label>
    <div class="clearfix"></div>
</div>

@if(!isset($cour))
<div class="form-group{{ $errors->has('fichier') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
       <input type="file" id="fichier" name="fichier">

        @if ($errors->has('fichier'))
            <span class="help-block">
                <strong>{{ $errors->first('fichier') }}</strong>
            </span>
        @endif
    </div>
    <label for="fichier" class="col-md-3 control-label">تحميل الملف</label>
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

