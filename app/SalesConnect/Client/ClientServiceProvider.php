<?php namespace SalesConnect\Client;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider{

	protected $app;

	public function __construct(Application $app){
		$this->app = $app;
	}

	public function register(){
		$this->app->bind(
			'SalesConnect\Client\ClientInterface', 
			'SalesConnect\Client\ClientRepository'
		);
	}
}