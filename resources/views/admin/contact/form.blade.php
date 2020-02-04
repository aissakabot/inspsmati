
                   
{{ csrf_field() }}

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('name',null,['class'=>'form-control']) !!}

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <label for="name" class="col-md-3 control-label">اس مالمرسل</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('special') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('typemess',contact(),null,['class'=>'form-control']) !!}

        @if ($errors->has('typemess'))
            <span class="help-block">
                <strong>{{ $errors->first('typemess') }}</strong>
            </span>
        @endif
    </div><label for="typemess" class="col-md-3 control-label">نوع الرسالة</label>
    <div class="clearfix"></div>

</div>

<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::textarea('message',null,['rows'=>5, 'class'=>'form-control']) !!}

        @if ($errors->has('message'))
            <span class="help-block">
                <strong>{{ $errors->first('message') }}</strong>
            </span>
        @endif
    </div>
    <label for="message" class="col-md-3 control-label">نص الرسالة</label>
    <div class="clearfix"></div>
</div>
<br>
<div class="alert alert-warning" style="height: 15px;" >لا يمكن ادخال أكثر من 300 حرف</div>


@if(!isset($realisation))

@endif
<div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('subject',null,['class'=>'form-control']) !!}

        @if ($errors->has('subject'))
            <span class="help-block">
                <strong>{{ $errors->first('subject') }}</strong>
            </span>
        @endif
    </div>
    <label for="subject" class="col-md-3 control-label">موضوع الرسالة</label>
    <div class="clearfix"></div>

</div>


<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('email',null,['class'=>'form-control']) !!}

        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <label for="email" class="col-md-3 control-label">البريد الإلكتروني</label>
    <div class="clearfix"></div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <button type="submit" class="btn btn-primary">
            حفظ
        </button>
    </div>
</div>
