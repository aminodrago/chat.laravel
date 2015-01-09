<?php

class UserTableSeeder extends DatabaseSeeder
{
	public function run()
	{
		User::create(
			array(
				'id' => 1,
				'username' => 'admin',
				'password' => Hash::make('admin')
			)
		);
	}
}