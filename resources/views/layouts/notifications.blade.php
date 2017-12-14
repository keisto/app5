@if(count($errors))
<div class="notification is-danger">
	@foreach ($errors->all() as $error)

			<button class="delete"></button>
			{{ $error }}

	@endforeach
	</div>
@endif
{{-- session()->flash('status', 'Task was successful!'); --}}

  @if (Session::has('message'))
		<div class="notification notify">
		   <button class="delete"></button>
			<p class="has-text-white">
		   	{{ Session::get('message') }}
			</p>
		 </div>
  @endif
	{{-- @foreach ($errors->all() as $error)
	<div class="form-error" hidden>{{ $error }}</div>
	@endforeach --}}



@section('footer')
<script>
	function hideNotify(e) {
		$('#notify').css('display', 'none');
	};
	$("#notify").each(function() {
		$(this).fadeOut(5000, function() {
    	$(this).remove();
  	});
	});
</script>
@endsection
