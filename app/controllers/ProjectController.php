<?php

use SalesConnect\Project\ProjectInterface;
use SalesConnect\Project\ProjectValidation;

class ProjectController extends \BaseController {

	protected $project;
	protected $validator;

	public function __construct(ProjectInterface $project, ProjectValidation $validator){
		$this->project = $project;
		$this->validator = $validator;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->project->getAll();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$clients = $this->project->clientsList();
		return View::make('projects.create', compact('clients'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$project = new SalesConnect\Project\ProjectHandler($this, $this->project, $this->validator);
		return $project->createProject($input);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$project = $this->project->getById($id);
		$clients = $this->project->clientsList();
		return View::make('projects.edit', compact('project', 'clients'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = $this->project->getById($id);
		$input = Input::all();
		$updator = new SalesConnect\Project\ProjectHandler($this, $this->project, $this->validator);
		return $updator->updateProject($input, $project);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$project = $this->project->getById($id);
		$project->delete();

		return Response::json('Project is Deleted', 200);
	}

	public function validationPassed(){
		
		// return Redirect::home()->with('msg', 'Thank you for your pledge.');
		// return Redirect::route('projects.index');
	}

	public function validationFailed($errors){
		// return Redirect::back()->withInput()->withErrors($errors);
	}


}
