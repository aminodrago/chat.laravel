<?php

class ChatPost extends Eloquent
{
	protected $table = "chat_posts";
	protected $fillable = array('username', 'message');
}