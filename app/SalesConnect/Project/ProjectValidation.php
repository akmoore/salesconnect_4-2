<?php namespace SalesConnect\Project;

use SalesConnect\Generic\GenericValidation;

class ProjectValidation extends GenericValidation{
	
	public function getRules($id = null){
		$rules = [
			'title' => 'required'
			// 'email' => 'required|unique:pledges,email,' . $id
		];

		return $rules;
	}

	public function getMessages(){
		$messages = [
			'title.required' => 'The Title is required.'
		];

		return $messages;
	}
}