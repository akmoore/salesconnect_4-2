<?php namespace SalesConnect\Edit;

use SalesConnect\Edit\EditInterface;
use \Edit;

class EditRepository implements EditInterface{

	public function __construct(Edit $edit){
		$this->edit = $edit;
	}
	
	public function getAll(){
		return $this->edit->all();
	}

	public function getById($id){
		return $this->edit->findOrFail($id);
	}

	public function getBySlug($slug){
		return $this->edit->where('slug', '=', $slug)->first();
	}

	public function createRecord($input){
		$edit = $this->edit->create([
			'project_id' => $input['project_id'],
			'edit_master_number' => $input['edit_master_number'],
			'edit_sub_number' => $input['edit_sub_number'],
			'edit_date' => $input['edit_date'],
			'edit_start_time' => $input['edit_start_time'],
			'edit_end_time' => $input['edit_end_time']
		]);
	}

	public function updateRecord($input, $id){
		// Update Edit
	}
}
