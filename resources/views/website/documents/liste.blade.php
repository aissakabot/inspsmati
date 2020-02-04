@extends('layouts.main')
@section('title')
الوثائق
@endsection
@section('style')
<style>
.listedocs{
	margin-top: 100px;
	margin-bottom: 100px;
}
.cont{
	background-color: #fff;
	width:80%;
	margin:auto;
	padding: 20px;

}

 a :focus, a: visited,a:active{
	color:#cd103a;
	font-weight: bold;
	text-decoration: none;
}

</style>

@endsection

@section('content')
<div class="listedocs">

<div class="cont">
<table class="table table-bordered">
<thead>
	
	<th>#</th>
	<th>عنوان الوثيقة</th>
	<th>ملف الوثيقة</th>
</thead>
<tbody>
	@foreach($docs as $doc)

	<tr>
<td>{{$doc->id}}</td>
<td>{{$doc->libelle}}</td>
<td><a href="{{asset('docs/'.$doc->fichier)}}">{{$doc->fichier}}</td>
	</tr>
@endforeach

</tbody>

</table>

<p class="text-center">{{$docs->links()}}</p>
</div>
</div>




@endsection




