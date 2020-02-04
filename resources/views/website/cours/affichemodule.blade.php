
<div class=" menu menumod listelesson">

<table class="table table-bordered table-stripped">
<thead>
<th>عنوان الدرس</th>
<th>الوصف</th>
<th>رابط تحميل الملف</th>
<th>رابط الفيديو</th>

</thead>
<tbody>
@foreach($mods as $lesson )

	<tr>
<td>{{$lesson->titre}}</td>
<td>{{$lesson->descrip}}</td>
<td><a href="{{asset('cours/'.$lesson->fichier)}}">{{$lesson->fichier}}</a></td>
<td>{{$lesson->created_at}}</td>

	</tr>
@endforeach

</tbody>

</table>


</div>
<style type="text/css">
	a{
		text-decoration: none;
		color: blueviolet;
		font-weight: bold;
	}
	a:hover,a:visited{
		color: red;
	}
</style>

