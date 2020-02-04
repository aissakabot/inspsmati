
                   
{{ csrf_field() }}

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

<div class="form-group{{ $errors->has('special') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('special',listespecial(),null,['class'=>'form-control']) !!}

        @if ($errors->has('special'))
            <span class="help-block">
                <strong>{{ $errors->first('special') }}</strong>
            </span>
        @endif
    </div><label for="special" class="col-md-3 control-label">العنوان</label>
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
    <label for="descrip" class="col-md-3 control-label">وصف الإنجاز</label>
    <div class="clearfix"></div>
</div>
<br>
<div class="alert alert-warning" style="height: 15px;" >لا يمكن ادخال أكثر من 300 حرف</div>

<div class="form-group{{ $errors->has('daterealis') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::date('daterealis',null,['class'=>'form-control']) !!}

        @if ($errors->has('daterealis'))
            <span class="help-block">
                <strong>{{ $errors->first('daterealis') }}</strong>
            </span>
        @endif
    </div>
    <label for="daterealis" class="col-md-3 control-label">تاريخ الإنجاز</label>
    <div class="clearfix"></div>
</div>
@if(!isset($realisation))
<div class="form-group{{ $errors->has('imagerealis') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
       <input type="file" id="imagerealis" name="imagerealis">

        @if ($errors->has('imagerealis'))
            <span class="help-block">
                <strong>{{ $errors->first('imagerealis') }}</strong>
            </span>
        @endif
    </div>
    <label for="imagerealis" class="col-md-3 control-label">صورة الإنجاز</label>
    <div class="clearfix"></div>

</div>
@endif
<div class="form-group{{ $errors->has('keywordrealis') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('keywordrealis',null,['class'=>'form-control']) !!}

        @if ($errors->has('keywordrealis'))
            <span class="help-block">
                <strong>{{ $errors->first('keywordrealis') }}</strong>
            </span>
        @endif
    </div>
    <label for="keywordrealis" class="col-md-3 control-label">كلنات مفتاحية</label>
    <div class="clearfix"></div>

</div>


<div class="form-group{{ $errors->has('equipe') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('equipe',null,['class'=>'form-control']) !!}

        @if ($errors->has('equipe'))
            <span class="help-block">
                <strong>{{ $errors->first('equipe') }}</strong>
            </span>
        @endif
    </div>
    <label for="equipe" class="col-md-3 control-label">فريق العمل</label>
    <div class="clearfix"></div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
