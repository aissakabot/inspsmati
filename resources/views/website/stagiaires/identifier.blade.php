@extends('layouts.main')
@section('title')
تعريف المتربص
@endsection
@section('style')
<style type="text/css">
.log{
	margin-top: 50px;
	background-color: #fff
	
}
.log h1{
	font-size: 17px;
	font-weight: bold;
	text-align: center;
}
.log input{
	background-color: #ccc;
	border-radius: 0px;
	border:none;
	font-weight: bold;
	border-bottom: 2px solid #11b7e6;
}
.alert-danger{
	background-color: red;
}

</style>
@endsection
@section('content')
<div class="log" >
<div class="container">
<h1> معلومات تعريف المتربص :</h1>
<form action="{{url('/stagiaires/res')}}" method="post">
{!! csrf_field()!!}
<div class="form-group">
<input type="text" class="form-control" name="numinscrit" placeholder="ادخل رقم التسجيل">
</div>
<div class="form-group">
<input type="password" class="form-control" name="password" placeholder="ادخل كلمة المرور">
</div>
<div class="form-group">
<input type="submit" class="btn btn-info" name="submit" value="دخول">
</div>
</form>
</div>
   @if (session('status'))
                    <div class="alert alert-danger" style="background-color: red;color: #fff;width:60%;margin:auto">
                        {{ session('status') }}
                    </div>
                @endif
</div>
@endsection
@section('script')
<script type="text/javascript">
setTimeout(function(){ 

	$(".alert").hide();
	 }, 7000);

</script>
@endsection