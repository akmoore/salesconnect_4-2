<?php namespace SalesConnect\Ae;

use SalesConnect\Generic\GenericValidationException;

class AeHandler {

	protected $listener;
	protected $ae;
	protected $validator;

	public function __construct($listener, $ae, $validator){
		$this->listener = $listener;
		$this->ae = $ae;
		$this->validator = $validator;
	}

	public function createAe($input){
		try {
			$this->validator->validate($input);
			$this->ae->createRecord($input);
			return $this->listener->validationPassed();
		} catch (GenericValidationException $e) {
			return $e->getErrors();
		}
	}

	public function updateAe($input, $ae){
		try {
			$this->validator->validate($input, $ae);
			$this->ae->updateRecord($input, $ae);
			return $this->listener->validationPassed();
		} catch (GenericValidationException $e) {
			return $e->getErrors();
		}
	}
}