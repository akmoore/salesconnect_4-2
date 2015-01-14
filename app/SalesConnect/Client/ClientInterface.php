<?php namespace SalesConnect\Client;

use SalesConnect\Generic\GenericInterface;

interface ClientInterface extends GenericInterface{

	public function agenciesList();
	public function usersList();
	public function aesList();
}