<?php

use SalesConnect\Agency\AgencyInterface;
use SalesConnect\Agency\AgencyValidation;

class AgencyController extends \BaseController {

	protected $agency;
	protected $validator;

	public function __construct(AgencyInterface $agency, AgencyValidation $validator){
		$this->agency = $agency;
		$this->validator = $validator;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// return "Here are some agencies";
		return $this->agency->getAll();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('agencies.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$agency = new SalesConnect\Agency\AgencyHandler($this, $this->agency, $this->validator);
		return $agency->createAgency($input);
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
		$agency = $this->agency->getById($id);
		return View::make('agencies.edit', compact('agency'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$agency = $this->agency->getById($id);

		$updator = new SalesConnect\Agency\AgencyHandler($this, $this->agency, $this->validator);
		return $updator->updateAgency($input, $agency);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$agency = $this->agency->getById($id);
		$agency->delete();

		return Response::json('Agency has been deleted.', 200);
	}

	public function validationPassed(){
		
		// return Redirect::home()->with('msg', 'Thank you for your pledge.');
		return Redirect::route('agencies.index');
	}

	public function validationFailed($errors){
		return Redirect::back()->withInput()->withErrors($errors);
	}


}
