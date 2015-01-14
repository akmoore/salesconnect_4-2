<?php namespace SalesConnect\Client;

use SalesConnect\Generic\GenericValidationException;

class ClientHandler {

	protected $listener;
	protected $client;
	protected $validator;

	public function __construct($listener, $client, $validator){
		$this->listener = $listener;
		$this->client = $client;
		$this->validator = $validator;
	}

	public function createClient($input){
		try {
			$this->validator->validate($input);
			$this->client->createRecord($input);
			return $this->listener->validationPassed();
		} catch (GenericValidationException $e) {
			return $this->listener->validationFailed($e->getErrors());
		}
	}

	public function updateClient($input, $client){
		try {
			$this->validator->validate($input, $client);
			return $this->client->updateRecord($input, $client);
			return $this->listener->validationPassed();
		} catch (GenericValidationException $e) {
			return $this->listener->validationFailed($e->getErrors());	
		}
	}
}