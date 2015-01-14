<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class User extends Eloquent implements UserInterface, RemindableInterface, SluggableInterface {

	use UserTrait, RemindableTrait, SluggableTrait;

	protected $sluggable = array(
        'build_from' => 'fullname',
        'save_to'    => 'slug',
    );

    public function getFullnameAttribute() {
        return $this->first_name . ' ' . $this->last_name;
    }

	protected $fillable = [
		'first_name', 'last_name', 
		'slug', 'work_phone', 'cell_phone',
		'email', 'password', 'type', 'fullname'
	];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function clients(){
		return $this->belongsToMany('Client')->withTimestamps();
	}

	public function projects(){
		return $this->hasMany('Project');
	}

}