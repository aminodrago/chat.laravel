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

}
