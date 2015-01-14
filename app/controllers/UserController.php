<?php

use SalesConnect\User\UserInterface;
use SalesConnect\User\UserValidation;

class UserController extends \BaseController {

	protected $users;
	protected $validator;

	public function __construct(UserInterface $users, UserValidation $validator){
		$this->users = $users;
		$this->validator = $validator;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Response::json($this->users->getAll());
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$user = new SalesConnect\User\UserHandler($this, $this->users, $this->validator);
		return $user->createUser($input);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = $this->users->getById($id);
		// $user = $this->users->getBySlug($id);
		return View::make('users.show', compact('user'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = $this->users->getById($id);
		return View::make('users.edit', compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//Update record.
		$input = Input::all();
		$user = $this->users->getById($id);

		$updater = new SalesConnect\User\UserHandler($this, $this->users, $this->validator);
		return $updater->updateUser($input, $user);

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$user = $this->users->getById($id);

		// return $user;
		$user->delete();

		return Redirect::route('users.index');
	}

	public function validationPassed(){
		
		// return Redirect::home()->with('msg', 'Thank you for your pledge.');
		return Redirect::route('users.index');
	}

	public function validationFailed($errors){
		return Redirect::back()->withInput()->withErrors($errors);
	}


}
