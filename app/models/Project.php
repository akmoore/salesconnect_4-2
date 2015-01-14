<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Project extends \Eloquent implements SluggableInterface{

	use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'title',
        'save_to'    => 'slug',
    );

	protected $fillable = [
		'user_id', 'client_id', 'active', 
		'title', 'slug', 'length', 
		'start_date', 'end_date', 'preproduction_date', 
		'preproduction_start_time', 'preproduction_end_time',
		'shoot_date', 'shoot_start_time', 'shoot_end_time',
		'air_date', 'c_number', 'isci', 'notes', 'production_order', 
		'production_order_date'
	];

	public function user(){
		return $this->belongsTo('User');
	}

	public function client(){
		return $this->belongsTo('Client');
	}

	public function edits(){
		return $this->hasMany('Edit');
	}

	public function aes(){
		return $this->belongsToMany('Ae')->withTimestamps();
	}
}