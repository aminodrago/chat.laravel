@extends('base')
@section('content')
<!--container-->
<div id="container">
</div>
<div style="margin-top: 15px;" class="ui segment">
	<form id="form" class="ui form">
		<p><input type="text" name="username" 
			@if(Auth::check())
				value="{{{Auth::user()->username}}}"
			@endif
			placeholder="username" class="ui input"></p>
		<p><textarea class="ui textarea"></textarea></p>
	</form>
	<p><button id="send" class="ui tiny green button">send</button></p>
</div>
@stop
@section('scripts')
<script>
var lastId = null;
$(function(){
	checkNewPosts();
	setInterval(checkNewPosts, 2000);
	$("#send").on('click', function(e){ checkUsername() });
})

function checkUsername()
{
	var username = $("#form input[type=text]").val();
	var addr = "/check-for-username";
	$.ajax({
		url: addr,
		type: "POST",
		dataType: "json",
		data: {username: username}
	}).done(checkUsernameCallback);
}

function checkUsernameCallback(data)
{
	if (data.status == 'ok')
	{
		sendData();
	}
	else
	{
		alert(data.message);
	}
}

function sendData(){
	var username = $("#form input[type=text]").val();
	var message = $("#form textarea").val();

	$.ajax({
		url: "/add-reply",
		type: "POST",
		dataType: "json",
		data: {username: username, message: message}
	});
}

function checkNewPosts(){
	var res = "/posts-since";
	$.ajax({
		url: res,
		type: "post",
		data: {lastId: lastId},
		success: checkNewPostsCallback
	})
}

function checkNewPostsCallback(e){
	$("#container").html(e);
}
</script>
@stop