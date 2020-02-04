
                   
{{ csrf_field() }}
<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('type',typeoffre(),null,['class'=>'form-control']) !!}

        @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
    </div><label for="type" class="col-md-3 control-label">نوع التكوين</label>
    <div class="clearfix"></div>

</div>

<div class="form-group{{ $errors->has('intitule') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('intitule',intitulespecialite(),null,['class'=>'form-control']) !!}

        @if ($errors->has('intitule'))
            <span class="help-block">
                <strong>{{ $errors->first('intitule') }}</strong>
            </span>
        @endif
    </div><label for="intitule" class="col-md-3 control-label">اسم التخصص</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('datedebut') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::date('datedebut',null,['class'=>'form-control']) !!}

        @if ($errors->has('datedebut'))
            <span class="help-block">
                <strong>{{ $errors->first('datedebut') }}</strong>
            </span>
        @endif
    </div>
    <label for="datedebut" class="col-md-3 control-label">تاريخ البداية</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('datefin') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::date('datefin',null,['class'=>'form-control']) !!}

        @if ($errors->has('datefin'))
            <span class="help-block">
                <strong>{{ $errors->first('datefin') }}</strong>
            </span>
        @endif
    </div>
    <label for="datefin" class="col-md-3 control-label">تاريخ النهاية</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('soumestre') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::select('soumestre',['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'],['class'=>'form-control']) !!}

        @if ($errors->has('soumstre'))
            <span class="help-block">
                <strong>{{ $errors->first('soumestre') }}</strong>
            </span>
        @endif
    </div>
    <label for="soumestre" class="col-md-3 control-label">السداسي الحالي</label>
    <div class="clearfix"></div>
</div>
<div class="form-group{{ $errors->has('nbstag') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
        {!! Form::text('nbstag',null,['class'=>'form-control']) !!}

        @if ($errors->has('nbstag'))
            <span class="help-block">
                <strong>{{ $errors->first('nbstag') }}</strong>
            </span>
        @endif
    </div>
    <label for="nbstag" class="col-md-3 control-label">عدد المتربصين</label>
    <div class="clearfix"></div>
</div>

<div class="form-group{{ $errors->has('diplome') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('diplome',diplome(),null,['class'=>'form-control']) !!}

        @if ($errors->has('diplome'))
            <span class="help-block">
                <strong>{{ $errors->first('diplome') }}</strong>
            </span>
        @endif
    </div><label for="diplome" class="col-md-3 control-label">الشهادة</label>
    <div class="clearfix"></div>

</div>
<div class="form-group{{ $errors->has('professeur') ? ' has-error' : '' }}">
    

    <div class="col-md-7">
        {!! Form::select('professeur',listeprof(),null,['class'=>'form-control']) !!}

        @if ($errors->has('professeur'))
            <span class="help-block">
                <strong>{{ $errors->first('professeur') }}</strong>
            </span>
        @endif
    </div><label for="professeur" class="col-md-3 control-label">الأستاذ المشرف</label>
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
    <label for="descrip" class="col-md-3 control-label">وصف التخصص</label>
    <div class="clearfix"></div>
</div>

@if(!isset($actuel))
<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
   

    <div class="col-md-7">
       <input type="file" id="image" name="image">

        @if ($errors->has('image'))
            <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
            </span>
        @endif
    </div>
    <label for="image" class="col-md-3 control-label">صورة التخصص</label>
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
