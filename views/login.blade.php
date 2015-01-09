@extends('base')
@section('content')
	@if (! is_null(Session::get('err')))
		<div class="ui inverted red segment">
			<p>{{Session::get('err')}}</p>
		</div>
	@endif
	<form action="{{url('login')}}" method="post" class="ui form">
		<p><input type="text" name="username" placeholder="username" class="ui input"></p>
		<p><input type="password" name="password" placeholder="password" class="ui input"></p>
		<p><button id="send" class="ui tiny green button">login</button></p>
	</form>
@stop