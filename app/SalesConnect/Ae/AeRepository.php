<?php namespace SalesConnect\Ae;

use SalesConnect\Ae\AeInterface;
use \Ae;

class AeRepository implements AeInterface{

	protected $ae;

	public function __construct(Ae $ae){
		$this->ae = $ae;
	}

	public function getAll(){
		return $this->ae->with('clients', 'projects')->get();
	}

	public function getById($id){
		return $this->ae->with('clients', 'projects')->findOrFail($id);
	}

	public function getBySlug($slug){
		return $this->ae->with('clients', 'projects')->where('slug', '=', $slug)->first();
	}

	public function createRecord($input){
		$ae = $this->ae->create([
			'first_name' => $input['first_name'],
			'last_name' => $input['last_name'],
			'work_phone' => $input['work_phone'],
			'cell_phone' => $input['cell_phone'],
			'email' => $input['email']
		]);

		return $ae;
	}

	public function updateRecord($input, $ae){
		$ae->first_name = $input['first_name'];
		$ae->last_name = $input['last_name'];
		$ae->work_phone = $input['work_phone'];
		$ae->cell_phone = $input['cell_phone'];
		$ae->email = $input['email'];
		$ae->save();

		return $ae;
	}
}