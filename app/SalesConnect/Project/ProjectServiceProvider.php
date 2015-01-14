<?php namespace SalesConnect\Project;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;

class ProjectServiceProvider extends ServiceProvider{

	protected $app;

	public function __construct(Application $app){
		$this->app = $app;
	}

	public function register(){

		$this->app->bind(
			'SalesConnect\Project\ProjectInterface',
			'SalesConnect\Project\ProjectRepository'
		);
	}
}