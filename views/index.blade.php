@extends('base')
@section('content')
<!--container-->
<div id="container">
</div>
<div style="margin-top: 15px;" class="ui segment">
	<form id="form" class="ui form">
		<p><input type="text" name="username" placeholder="username" class="ui input"></p>
		<p><textarea class="ui textarea"></textarea></p>
	</form>
	<p><button id="send" class="ui tiny green button">send</button></p>
</div>
@stop