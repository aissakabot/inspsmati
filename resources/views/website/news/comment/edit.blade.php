@if(isset($neww) && auth()->check())	<form method="post" action="{{ url("news/add/comment/".$neww->id) }}">
{{ csrf_field() }}
		<div class="form-group">
			<label for="comment">نص التعليق</label>
			<textarea name="comment" id="comment" rows="8" class="form-control"></textarea>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-info">إرسال التعليق</button>
		</div>
	</form>
@endif