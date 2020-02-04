@extends('layouts.main')
@section('title')

@endsection
@section('style')
<style type="text/css">
	.delib{
		background-color: #fff;
		width:80%;
		
		padding: 30px;
		margin: 40px auto;
	}
	.delib .remarque{
		margin-top: 40px;
	}
	.delib .remarque select{
		width:80%;
		background-color: #ccc;
		font-weight: bold;
		border-radius: 0;
		border:none;
		border-bottom: 2px solid #11b7e6;
	}
	.texte{
		font-weight: bold;
		color: red;
		padding-left:30px;
	}
	.alert-danger{
	background-color: red;
}
</style>
@endsection
@section('content')
<div class="delib">

<div class="res">
<div class="renseign">
	<span class="texte">الاسم والقب: </span><span class="">{{$res->nom}} {{$res->prenom}}</span><br>
	
	<span class="texte">التخصص: </span><span class="">{{$res->specialite}} </span><br>
	<span class="texte">رقم التسجيل: </span><span class="">{{$res->numinscrit}} </span><br>
</div>
<div class="remarque">
	<div class="form-group">
	 <select class="form-control" name="soumes" id="soumes">
      <option value="0" selected>اختر رقو السداسي</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
      </select>

	</div>
	<div id="resinscrit"></div>
</div>
</div>


</div>
@endsection
@section('script')
<script type="text/javascript">

	$("#soumes").change(function(){
		
var soumes=$(this).val();
numinscrit={{$res->numinscrit}};

		$.ajax({
        type: 'get',
        dataType:'html',
                 url:  '<?php echo url("stagiaires/resaffiche") ?>',
        data: {'soumes':soumes,'numinscrit':numinscrit},
        success: function (resul) {
       
              $("#resinscrit").empty();
             $("#resinscrit").html(resul);
                       }
    });
	});


		

</script>
@endsection