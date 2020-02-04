		@php $comments = \App\Realisationcomment::where("realisation_id" ,$realisation->id )->with("user")->get(); @endphp
			<h3>التعليق ({{ count($comments) }})</h3>
		@if(count($comments) > 0)
		<ol>
		@foreach($comments as $comment)
			<li id="comment{{$comment->id}}">
				<div>
					<span>{{ $comment->user->name}}</span>
					<span>{{ $comment->created_at}}</span>
					<p>{{ $comment->comment}}</p>
@if(auth()->check() && $comment->user_id == auth()->user()->id)			<a href="{{url("realisations/delete/comment/".$comment->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> حذف</a>
			<span class="btn btn-info" onclick="$(this).next().slideToggle()"><i class="fa fa-edit"> تعديل</i></span>
	<form method="post" action="{{ url("realisations/update/comment/".$comment->id) }}" style="display:none">	
	{{ csrf_field() }}

		<div class="form-group">
			<label for="comment">نص التعليق</label>
			<textarea name="comment" id="comment" rows="8" class="form-control">{{ $comment->comment }}</textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-info">تعديل</button>
		</div>
	</form>
@endif		{!! !$loop->last ? "<hr>"  : ""   !!} 
				</div>
			</li>
		@endforeach
		</ol>
		@endif
