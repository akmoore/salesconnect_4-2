<?php namespace SalesConnect\Agency;

use SalesConnect\Agency\AgencyInterface;
use \Agency;

class AgencyRepository implements AgencyInterface{

	protected $agency;

	public function __construct(Agency $agency){
		$this->agency = $agency;
	}

	public function getAll(){
		return $this->agency->with('clients')->get();
	}

	public function getById($id){
		return $this->agency->with('clients')->findOrFail($id);
	}

	public function getBySlug($slug){
		return $this->agency->with('clients')->where('slug', '=', $slug)->first();
	}

	public function createRecord($input){

		$agency = $this->agency->create([
			'name' => $input['name'],
			'contact_first_name' => $input['contact_first_name'],
			'contact_last_name' => $input['contact_last_name'],
			'contact_email' => $input['contact_email'],
			'contact_phone' => $input['contact_phone']
		]);

		return $agency;
	}

	public function updateRecord($input, $agency){

		$agency->name = $input['name'];
		$agency->contact_first_name = $input['contact_first_name'];
		$agency->contact_last_name = $input['contact_last_name'];
		$agency->contact_email = $input['contact_email'];
		$agency->contact_phone = $input['contact_phone'];
		$agency->save();

		return $agency;

	}
}
