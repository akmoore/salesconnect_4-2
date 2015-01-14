<?php

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Agency extends \Eloquent implements SluggableInterface {

	use SluggableTrait;

	protected $sluggable = array(
        'build_from' => 'name',
        'save_to'    => 'slug',
    );

	protected $table = 'agencies';

	protected $fillable = [
		'name', 'slug', 'contact_first_name',
		'contact_last_name', 'contact_email',
		'contact_phone'
	];

	public function clients(){
		return $this->hasMany('Client');
	}
}
