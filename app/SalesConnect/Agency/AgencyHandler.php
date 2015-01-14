<?php namespace SalesConnect\Agency;

use SalesConnect\Generic\GenericValidationException;

class AgencyHandler {

	protected $listener;
	protected $agency;
	protected $validator;

	public function __construct($listener, $agency, $validator){
		$this->listener = $listener;
		$this->agency = $agency;
		$this->validator = $validator;
	}

	public function createAgency($input){
		try {
			$this->validator->validate($input);
			$this->agency->createRecord($input);
			return $this->listener->validationPassed();
		} catch (GenericValidationException $e) {
			return $this->listener->validationFailed($e->getErrors());
		}
	}

	public function updateAgency($input, $agency){
		try {
			$this->validator->validate($input, $agency);
			$this->agency->updateRecord($input, $agency);
			return $this->listener->validationPassed();
		} catch (GenericValidationException $e) {
			return $this->listener->validationFailed($e->getErrors());
		}
	}
}