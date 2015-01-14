<?php

class Edit extends \Eloquent {
	protected $fillable = [
		'project_id', 'edit_master_number', 'edit_sub_number', 
		'edit_date', 'edit_start_time', 'edit_end_time', 'notes'
	];

	public function projects(){
		return $this->belongsTo('Project');
	}
}
