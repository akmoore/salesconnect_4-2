<?php namespace SalesConnect\User;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;

class UserServiceProvider extends ServiceProvider{

	protected $app;

	public function __construct(Application $app){
		$this->app = $app;
	}

	public function register(){

		$this->app->bind(
			'SalesConnect\User\UserInterface',
			'SalesConnect\User\UserRepository'
		);
	}
}