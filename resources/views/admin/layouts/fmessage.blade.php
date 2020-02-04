
@if(Session::has('flash_message'))
<div class="container">
	<div class="alert alert-warning">

	</div>
</div>
<script>
swal("", "{{Session::get('flash_message')}}");
</script>
@endif