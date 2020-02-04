
                   
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



<div class="form-group{{ $errors->has('sujet') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::textarea('sujet',null,['rows'=>5, 'class'=>'form-control']) !!}

        @if ($errors->has('sujet'))
            <span class="help-block">
                <strong>{{ $errors->first('sujet') }}</strong>
            </span>
        @endif
    </div>
    <label for="descrip" class="col-md-3 control-label">الموضوع</label>
    <div class="clearfix"></div>
</div>
<br>
<div class="alert alert-warning" style="height: 15px;" >لا يمكن ادخال أكثر من 300 حرف</div>


@if(!isset($neww))
<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
   
    <div class="col-md-7">
       <input type="file" id="image" name="image">

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <label for="image" class="col-md-3 control-label">صورة الإنجاز</label>
    <div class="clearfix"></div>
</div>

@endif
<div class="form-group{{ $errors->has('video') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::text('video',null,['class'=>'form-control']) !!}

        @if ($errors->has('video'))
            <span class="help-block">
                <strong>{{ $errors->first('video') }}</strong>
            </span>
        @endif
    </div>
    <label for="video" class="col-md-3 control-label">رابط الفيديو</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('keywordnews') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('keywordnews',null,['class'=>'form-control']) !!}

        @if ($errors->has('keywordnews'))
            <span class="help-block">
                <strong>{{ $errors->first('keywordnews') }}</strong>
            </span>
        @endif
    </div>
    <label for="keywordrealis" class="col-md-3 control-label">كلنات مفتاحية</label>
    <div class="clearfix"></div>

</div>



<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
