<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Client extends \Eloquent implements SluggableInterface{

	use SluggableTrait;

    protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );

	protected $fillable = [
		'name', 'slug', 'primary_contact_first_name',
		'primary_contact_last_name', 'street', 'city',
		'state', 'postal', 'public_phone',
		'primary_contact_phone', 'primary_contact_email',
		'url', 'agency_id'
	];

	public function users(){
		return $this->belongsToMany('User')->withTimestamps();
	}

	public function agency(){
		return $this->belongsTo('Agency');
	}

	public function projects(){
		return $this->hasMany('Project');
	}

	public function aes(){
		return $this->belongsToMany('Ae')->withTimestamps();
	}
}