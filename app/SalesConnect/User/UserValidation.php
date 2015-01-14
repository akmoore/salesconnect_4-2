<?php namespace SalesConnect\User;

use SalesConnect\Generic\GenericValidation;

class UserValidation extends GenericValidation{
	
	public function getRules($id = null){
		$rules = [
			'first_name' => 'required',
			'last_name' => 'required'
			// 'email' => 'required|unique:pledges,email,' . $id
		];

		return $rules;
	}

	public function getMessages(){
		$messages = [
			'first_name.required' => 'The First Name field is required.',
			'last_name.required' => 'The Last Name field is required.'
		];

		return $messages;
	}
}