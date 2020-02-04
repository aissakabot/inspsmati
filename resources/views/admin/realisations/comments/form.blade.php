
                   


<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('title',null,['class'=>'form-control']) !!}

        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    <label for="title" class="col-md-3 control-label">العنوان</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('typeact') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('typeact',typeActivite(),null,['class'=>'form-control']) !!}

        @if ($errors->has('typeact'))
            <span class="help-block">
                <strong>{{ $errors->first('typeact') }}</strong>
            </span>
        @endif
    </div><label for="typeact" class="col-md-3 control-label">نوع النشاط</label>
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
    <label for="texte" class="col-md-3 control-label">وصف النشاط</label>
    <div class="clearfix"></div>
</div>
<br>
<div class="alert alert-warning" style="height: 15px;" >لا يمكن ادخال أكثر من 300 حرف</div>


@if(!isset($activite))
<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
       <input type="file" id="image" name="image">

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <label for="image" class="col-md-3 control-label">صورة النشاط</label>
    <div class="clearfix"></div>

</div>
@endif
<div class="form-group{{ $errors->has('keywordactivite') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('keywordactivite',null,['class'=>'form-control']) !!}

        @if ($errors->has('keywordactivite'))
            <span class="help-block">
                <strong>{{ $errors->first('keywordactivite') }}</strong>
            </span>
        @endif
    </div>
    <label for="keywordactivite" class="col-md-3 control-label">كلنات مفتاحية</label>
    <div class="clearfix"></div>

</div>



<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
