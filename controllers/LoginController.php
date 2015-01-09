<?php

class LoginController extends BaseController
{
	public function showLoginPage()
	{
		return View::make('login');
	}

	public function makeLogin()
	{
		$fields = Input::only('username', 'password');

		if (Auth::attempt($fields))
		{
			return Redirect::to('');
		}
		else
		{
			return Redirect::back()
				->with('err', 'Invalid username/password');
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('');
	}
}