<?php namespace SalesConnect\Client;

use SalesConnect\Generic\GenericValidation;

class ClientValidation extends GenericValidation{
	
	public function getRules($id = null){
		$rules = [
			'name' => 'required',
			// 'email' => 'required|unique:pledges,email,' . $id
		];

		return $rules;
	}

	public function getMessages(){
		$messages = [
			'name.required' => 'The Company\'s Name field is required.',
		];

		return $messages;
	}
}