<?php namespace SalesConnect\User;

use SalesConnect\Generic\GenericValidationException;

class UserHandler {

	protected $user;
	protected $listener;
	protected $validator;

	public function __construct($listener, $user, $validator){
		$this->user = $user;
		$this->listener = $listener;
		$this->validator = $validator;
	}

	public function createUser($input){

		// if validation passes
		
		try{
			$this->validator->validate($input);
			$this->user->createRecord($input);
			return $this->listener->validationPassed();
		}catch(GenericValidationException $e){
			// return $e->getErrors();
			return $this->listener->validationFailed($e->getErrors());
		}

	}

	public function updateUser($input, $user){

		try {
			$this->validator->validate($input, $user);
			$this->user->updateRecord($input, $user);
			return $this->listener->validationPassed();
		} catch (GenericValidationException $e) {
			return $this->listener->validationFailed($e->getErrors());
		}
	}
}