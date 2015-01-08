<h2>test</h2>
@foreach($posts as $postData)
<div class="ui segment">
	<p>{{{$postData->username}}} @ {{$postData->created_at}}:</p>
	<div class="ui basic segment">
		{{{$postData->message}}}
	</div>
</div>
@endforeach