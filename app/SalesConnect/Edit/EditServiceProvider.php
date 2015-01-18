<?php namespace SalesConnect\Edit;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;

class EditServiceProvider extends ServiceProvider{

	protected $app;

	public function __construct(Application $app){
		$this->app = $app;
	}

	public function register(){
		$this->app->bind(
			'SalesConnect\Edit\EditInterface', 
			'SalesConnect\Edit\EditRepository'
		);
	}
}