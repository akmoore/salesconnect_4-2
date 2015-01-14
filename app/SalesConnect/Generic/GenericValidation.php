<?php namespace SalesConnect\Generic;

use Illuminate\Validation\Factory as Validator;
use SalesConnect\Generic\GenericValidationException;

abstract class GenericValidation {
	
	protected $validator;

	protected $validation;

	protected $messages = [];

	public function __construct(Validator $validator){
		$this->validator = $validator;
	}

	public function validate(array $input, $id = null){
		$this->validation = $this->validator->make($input, $this->getValidationRules($id), $this->getValidationMessages());

		if($this->validation->fails()){

			throw new GenericValidationException('Validation Failed', $this->getValidationErrors());
		}

		return true;

		// return $this->getValidationRules($id);
	}

	public function getValidationRules($id = null){
		return $this->getRules($id);
	}

	public function getValidationMessages(){
		return $this->getMessages();
		// return $this->messages;
	}

	protected function getValidationErrors(){
		return $this->validation->errors();
	}
}