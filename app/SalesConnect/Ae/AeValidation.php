<?php namespace SalesConnect\Ae;

use SalesConnect\Generic\GenericValidation;

class AeValidation extends GenericValidation{
	
	public function getRules($id = null){
		$rules = [
			'first_name' => 'required',
			// 'email' => 'required|unique:pledges,email,' . $id
		];

		return $rules;
	}

	public function getMessages(){
		$messages = [
			'first_name.required' => 'Ae\'s First Name is required.',
		];

		return $messages;
	}
}