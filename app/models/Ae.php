<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Ae extends \Eloquent implements SluggableInterface{

	use SluggableTrait;

	protected $sluggable = array(
        'build_from' => 'fullnamer',
        'save_to'    => 'slug',
    );

    public function getFullnamerAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

	protected $fillable = [
		'first_name', 'last_name', 
		'slug', 'work_phone', 'cell_phone',
		'email', 'fullname'
	];

	public function clients(){
		return $this->belongsToMany('Client')->withTimestamps();
	}

	public function projects(){
		return $this->belongsToMany('Project')->withTimestamps();
	}
	
}