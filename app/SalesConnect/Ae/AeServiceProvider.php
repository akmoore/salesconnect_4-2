<?php namespace SalesConnect\Ae;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AeServiceProvider extends ServiceProvider{

	protected $app;

	public function __construct(Application $app){
		$this->app = $app;
	}

	public function register(){
		$this->app->bind(
			'SalesConnect\Ae\AeInterface',
			'SalesConnect\Ae\AeRepository'
		);
	}

}