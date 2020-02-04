@extends('layouts.main')
@section('title')اتصل بنا
@endsection
@section('style')
<style>
.h1 small {
font-size: 24px;
}
</style>
@endsection

@section('content')
<br><br>
<div class="container">
    <div class="row">
    
     <div class="col-md-4">
            
            <legend><span class="fa fa-envelope-o"></span> عنواننا</legend>
            <address>
                <strong>Twitter, Inc.</strong><br>
                {{nl2br(getsetting('adresse'))}}
                <abbr title="Phone">
                    P:</abbr>
                {{getsetting('telephone')}}
            </address>
            <address>
                <strong>{{getsetting('nominstitut')}}</strong><br>
                <a href="mailto:#">{{getsetting('email')}}</a>
            </address>
            
        </div>

        <div class="col-md-8">
            <div class="well well-sm">
            <form action="{{url('/contact')}}" method="POST">
                {{ csrf_field() }}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">
                    الاسم</label>
                <input type="text" class="form-control" name="name" placeholder="ادخل الاسم" required="required" />
            </div>
            <div class="form-group">
                <label for="email">
                   البريد الإلكتروني</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                    </span>
                    <input type="email" class="form-control" name="email" placeholder="ادخل البريد الإلكتروني" required="required" /></div>
            </div>
            <div class="form-group">
                <label for="subject">
                  عنوان الرسالة</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span>
                    </span>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="ادخل عنوان الرسالة" required="required" /></div>
            </div>
            <div class="form-group">
                <label for="subject">
                    نوع الرسالة</label>
                <select id="subject" name="typemess" class="form-control" required="required">
                    <option value="na" selected="">اختر واحدا:</option>
                    @foreach(contact() as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">
                    نص الرسالة</label>
                <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                    placeholder="الرسالة"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
               إرســال</button>
        </div>
    </div>
    </form>
            </div>
        </div>
       
    </div>
    <div class="col-sm-8 col-sm-offset-2" style="background-color: #fff;padding:10px;">
    <div class="maps" >
   
       
              <iframe   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26322.689778744938!2d5.037398166003259!3d34.4436121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128aaad981d60b07%3A0xe087d9e429ee00c2!2sInstitut+nationale+sp%C3%A9cialis%C3%A9+dans+la+formation+Professionnelle+Smati+Bouzid!5e0!3m2!1sfr!2sdz!4v1520200512528" width="90%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            
    </div>

    </div><div class="clearfix"></div>
</div>
@endsection