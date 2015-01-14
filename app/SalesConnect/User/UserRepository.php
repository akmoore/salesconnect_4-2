<?php namespace SalesConnect\User;

use SalesConnect\User\UserInterface;
use \User;

class UserRepository implements UserInterface{

	protected $user;

	public function __construct(User $user){
		$this->user = $user;
	}

	public function getAll(){
		return $this->user->with('clients', 'projects')->get();
	}

	public function getById($id){
		return $this->user->with('clients', 'projects')->findOrFail($id);
	}

	public function getBySlug($slug){
		return $this->user->with('clients', 'projects')->where('slug', '=', $slug)->first();
	}

	public function createRecord($input){
		
		$user = $this->user->create([
			'first_name' => $input['first_name'],
			'last_name' => $input['last_name'],
			// 'slug' => $input['slug'],
			'work_phone' => $input['work_phone'],
			'cell_phone' => $input['cell_phone'],
			'email' => $input['email'],
			'password' => \Hash::make($input['password']),
			'type' => $input['type']
		]);

		return $user;

	}

	public function updateRecord($input, $user){

		// if($input['old_password'] && $input['new_password'] && \Hash::check($input['old_password'])){
		// 	$user->password = \Hash::make($input['new_password']);
		// }

		$user->first_name = $input['first_name'];
		$user->last_name = $input['last_name'];
		$user->work_phone = $input['work_phone'];
		$user->cell_phone = $input['cell_phone'];
		$user->email = $input['email'];
		$user->type = $input['type'];
		$user->save();

		return $user;

	}
}