<?php

use SalesConnect\Ae\AeInterface;
use SalesConnect\Ae\AeValidation;

class AeController extends \BaseController {

	protected $ae;
	protected $validator;

	public function __construct(AeInterface $ae, AeValidation $validator){
		$this->ae = $ae;
		$this->validator = $validator;
	}

	/**
	 * Display a listing of the resource.
	 * GET /ae
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->ae->getAll();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ae/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('aes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ae
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$ae = new SalesConnect\Ae\AeHandler($this, $this->ae, $this->validator);
		return $ae->createAe($input);
	}

	/**
	 * Display the specified resource.
	 * GET /ae/{id}
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
	 * GET /ae/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ae = $this->ae->getById($id);
		return View::make('aes.edit', compact('ae'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /ae/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$ae = $this->ae->getById($id);
		$input = Input::all();
		$updator = new SalesConnect\Ae\AeHandler($this, $this->ae, $this->validator);
		return $updator->updateAe($input, $ae);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /ae/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$ae = $this->ae->getById($id);
		$ae->delete();

		return Response::json('Account Executive has been deleted.', 200);
	}

	public function validationPassed(){
		return "You've made it";
	}

}