<?php namespace SalesConnect\Agency;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class AgencyServiceProvider extends ServiceProvider{

	protected $app;

	public function __construct(Application $app){
		$this->app = $app;
	}

	public function register(){
		$this->app->bind(
			'SalesConnect\Agency\AgencyInterface',
			'SalesConnect\Agency\AgencyRepository'
		);
	}
}