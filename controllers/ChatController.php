<?php

class ChatController extends BaseController {

	public function getIndex()
	{
		return View::make('index');
	}

	public function postAddReply()
	{
		$post = new ChatPost();
		$post->username = Input::get('username');
		$post->message = Input::get('message');

		$post->save();

		return json_encode(array('id' => $post->id));
	}

	public function postPostsSince()
	{
		$lastId = Input::get('lastId');
		$tmpPosts = ChatPost::all();
		$render = View::make('posts')
				->with('posts', $tmpPosts);
		
		return $render;
	}

	public function postCheckForUsername()
	{
		$username = Input::get('username');
		$result = array('status' => 'ok', 'username' => $username, 'message' => '');

		if (Auth::check())
		{
			if (Auth::user()->username != $username)
			{
				$result = array(
					'status' => 'error', 
					'username' => $username, 
					'message' => 'This is not your username!'
				);
			}
			else
			{
				$result = array(
					'status' => 'ok', 
					'username' => $username, 
					'message' => ''
				);
			}
		}
		else
		{
			$usersWithSuchUsername = new User();
			$usersWithSuchUsername = $usersWithSuchUsername->where('username', '=', $username)
				->get();

			if (! count($usersWithSuchUsername))
			{
				$result = array(
					'status' => 'ok', 
					'username' => $username, 
					'message' => ''
				);
			}
			else
			{
				$result = array(
					'status' => 'error', 
					'username' => $username, 
					'message' => 'User already exists, try another username'
				);
			}
		}

		return json_encode($result);

	}

}
