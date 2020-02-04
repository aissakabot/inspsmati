
                   
{{ csrf_field() }}

<div class="form-group{{ $errors->has('special') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('special',listespecial(),null,['class'=>'form-control']) !!}

        @if ($errors->has('special'))
            <span class="help-block">
                <strong>{{ $errors->first('special') }}</strong>
            </span>
        @endif
    </div><label for="special" class="col-md-3 control-label">التخصص:</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('soum_id') ? ' has-error' : '' }}">
    

    <div class="col-md-7">

        {!! Form::select('soum_id',['1'=>'1','2','3','4','5'],null,['class'=>'form-control']) !!}

        @if ($errors->has('soum_id'))
            <span class="help-block">
                <strong>{{ $errors->first('soum_id') }}</strong>
            </span>
        @endif
    </div><label for="soum_id" class="col-md-3 control-label">السداسي:</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('module') ? ' has-error' : '' }}">
    <div class="col-md-7">
        {!! Form::text('module',null,['class'=>'form-control']) !!}

        @if ($errors->has('module'))
            <span class="help-block">
                <strong>{{ $errors->first('module') }}</strong>
            </span>
        @endif
    </div>
    <label for="module" class="col-md-3 control-label">المقياس:</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('coef') ? ' has-error' : '' }}">
    <div class="col-md-7">
        {!! Form::text('coef',null,['class'=>'form-control']) !!}

        @if ($errors->has('coef'))
            <span class="help-block">
                <strong>{{ $errors->first('coef') }}</strong>
            </span>
        @endif
    </div>
    <label for="coef" class="col-md-3 control-label">المعامل:</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('volh') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('volh',null,['class'=>'form-control']) !!}

        @if ($errors->has('volh'))
            <span class="help-block">
                <strong>{{ $errors->first('volh') }}</strong>
            </span>
        @endif
    </div>
    <label for="volh" class="col-md-3 control-label">الحجم الساعي:</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('noteelimin') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('noteelimin',null,['class'=>'form-control']) !!}

        @if ($errors->has('noteelimin'))
            <span class="help-block">
                <strong>{{ $errors->first('noteelimin') }}</strong>
            </span>
        @endif
    </div>
    <label for="noteelimin" class="col-md-3 control-label">النقطة الإقصائية:</label>
    <div class="clearfix"></div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
