<?php

use SalesConnect\Client\ClientInterface;
use SalesConnect\Client\ClientValidation;
use \Agency;
use \User;

class ClientController extends \BaseController {

	protected $client;
	protected $validator;

	public function __construct(ClientInterface $client, ClientValidation $validator){
		$this->client = $client;
		$this->validator = $validator;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->client->getAll();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$agencies = $this->client->agenciesList();
		$users = $this->client->usersList();
		$aes = $this->client->aesList();

		return View::make('clients.create', compact('agencies', 'users', 'aes'));
		// return Response::json(compact('agencies', 'users'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$client = new SalesConnect\Client\ClientHandler($this, $this->client, $this->validator);
		return $client->createClient($input);
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
		$client = $this->client->getById($id);
		$agencies = $this->client->agenciesList();
		$users = $this->client->usersList();
		$selectedUsers = $client->users->lists('id');
		// $users = $this->client->usersFullArray();
		return View::make('clients.edit', compact('client','users', 'agencies', 'selectedUsers'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$client = $this->client->getById($id);
		$input = Input::all();

		$updator = new SalesConnect\Client\ClientHandler($this, $this->client, $this->validator);
		return $updator->updateClient($input, $client);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$client = $this->client->getById($id);

		// return $client;
		$client->delete();

		return "Client deleted.";
		// return Redirect::route('clients.index');
	}

	public function validationPassed(){
		
		// return Redirect::home()->with('msg', 'Thank you for your pledge.');
		// return Redirect::route('agencies.index');
		return "Thank you";
	}

	public function validationFailed($errors){
		// return Redirect::back()->withInput()->withErrors($errors);
		return $errors;
	}


}
