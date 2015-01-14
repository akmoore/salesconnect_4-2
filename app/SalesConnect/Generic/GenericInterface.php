<?php namespace SalesConnect\Generic;

interface GenericInterface {

	public function getAll();
	public function getById($id);
	public function getBySlug($slug);
	public function createRecord($input);
	public function updateRecord($input, $id);
}