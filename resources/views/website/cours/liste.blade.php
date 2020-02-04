@extends('layouts.main')
@section('title')
@endsection
@section('style')
<style>
.listecours{
	margin-top: 100px;
	margin-bottom: 100px;
}
.menu{
	background-color: #fff;
	width:80%;
	margin:auto;
	padding: 20px;

}
.menu li{
	list-style-type: none;
	display: inline-block;
	margin-right: 50px;
	margin-bottom: 20px;
	background-color: #11b7e6;
	height: 50px;
	padding: 15px;
	color:#fff;
	font-weight: bold;
	cursor: pointer;
}
.menumat{
	background-color: #ffc728;
}
.menumod{
	background-color: #fff;
	color: #000;
	margin-top: 15px;
}

</style>

@endsection

@section('content')
<div class="listecours">
<div class="mcour"
<div class="container">
<div class="menu">
@foreach(listespecial() as $key=>$spec)
<li class="speci">{{$spec}}</li>

@endforeach
</div>
</div>


<div class="matiere" style="margin-top:50px;">
<div id="listemat">

</div>


</div>
</div>




@endsection
@section('script')
<script type="text/javascript">

	$(".speci").click(function(){
var speci=$(this).text();

		$.ajax({
        type: 'get',
        dataType:'html',
                 url:  '<?php echo url("/coursprof/affiche") ?>/'+speci,
        data: "speci=" + speci ,
        success: function (res) {
       
        
             $("#listemat").html(res);
                       }
    });
	});


		

</script>
@endsection



