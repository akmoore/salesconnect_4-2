<?php namespace SalesConnect\Project;

use SalesConnect\Generic\GenericInterface;

interface ProjectInterface extends GenericInterface{
	public function aesList();
	public function clientsList();
}