<?php namespace SalesConnect\Project;

use SalesConnect\Generic\GenericValidationException;

class ProjectHandler {

	protected $listener;
	protected $project;
	protected $validator;

	public function __construct($listener, $project, $validator){
		$this->listener = $listener;
		$this->project = $project;
		$this->validator = $validator;
	}

	public function createProject($input){
		try {
			$this->validator->validate($input);
			return $this->project->createRecord($input);
			return $this->listener->validationPassed();
		} catch (GenericValidationException $e) {
			return $this->listener->validationFailed($e->getErrors());
		}
	}

	public function updateProject($input, $project){
		try {
			$this->validator->validate($input, $project);
			$this->project->updateRecord($input, $project);
			return $this->listener->validationPassed();
		} catch (GenericValidationException $e) {
			return $e->getErrors();
		}
	}
}