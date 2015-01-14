<?php namespace SalesConnect\Client;

use SalesConnect\Client\ClientInterface;
use \Client;
use \Agency;
use \User;

class ClientRepository implements ClientInterface{

	protected $client;

	public function __construct(Client $client){
		$this->client = $client;
	}

	public function getAll(){
		return $this->client->with('users', 'agency', 'projects')->get();
	}

	public function getById($id){
		return $this->client->with('users', 'agency', 'projects')->findOrFail($id);
	}

	public function getBySlug($slug){
		return $this->client->with('users', 'agency', 'projects')->where('slug', '=', $slug)->first();
	}

	public function createRecord($input){
		$client = $this->client->create([
			'name' => $input['name'],
			'agency_id' => $input['agency_id'],
			'primary_contact_first_name' => $input['primary_contact_first_name'],
			'primary_contact_last_name' => $input['primary_contact_last_name'],
			'primary_contact_phone' => $input['primary_contact_phone'],
			'primary_contact_email' => $input['primary_contact_email'],
			'street' => $input['street'],
			'city' => $input['city'],
			'state' => $input['state'],
			'postal' => $input['postal'],
			'public_phone' => $input['public_phone'],
			'url' => $input['url']
		]);

		$client->aes()->attach($input['ae_id']);

		return $client;
	}

	public function updateRecord($input, $client){
		//update The Client's Record
		$client->name = $input['name'];
		$client->agency_id = $input['agency_id'];
		$client->primary_contact_first_name = $input['primary_contact_first_name'];
		$client->primary_contact_last_name = $input['primary_contact_last_name'];
		$client->primary_contact_phone = $input['primary_contact_phone'];
		$client->primary_contact_email = $input['primary_contact_email'];
		$client->street = $input['street'];
		$client->city = $input['city'];
		$client->state = $input['state'];
		$client->postal = $input['postal'];
		$client->public_phone = $input['public_phone'];
		$client->url = $input['url'];
		$client->save();

		$client->users()->sync($input['user_id']);

		return $client;
	}

	public function agenciesList(){
		$agencies = new Agency();
		return $agencies->orderBy('name')->lists('name', 'id');

		/* return $agencies->select('id', \DB::raw('CONCAT(contact_first_name, " ", contact_last_name) AS full_name'))
					 ->orderBy('contact_first_name')
					 ->lists('full_name', 'id'); */
	}

	public function usersList(){
		$users = new User();
		return $users->where('type', '=', 'ae')->orderBy('first_name')->lists('first_name', 'id');
	}

	public function aesList(){
		$aes = new \Ae();
		return $aes->select('id', \DB::raw('CONCAT(first_name, " ", last_name) AS full_name'))
					->orderBy('first_name')
					->lists('full_name', 'id'); 
	}

	public function usersFullArray(){
		$users = new User();
		return $users->where('type', '=', 'ae')->orderBy('first_name')->get();
	}

}









