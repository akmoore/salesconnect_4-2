<?php namespace SalesConnect\Project;

use SalesConnect\Project\ProjectInterface;
use SalesConnect\Client\ClientInterface;
use \Project;

class ProjectRepository implements ProjectInterface{

	protected $project;
	protected $client;

	public function __construct(Project $project, ClientInterface $client){
		$this->project = $project;
		$this->client = $client;
	}

	public function getAll(){
		return $this->project->with('aes', 'client', 'edits')->get();
	}

	public function getById($id){
		return $this->project->with('aes', 'client', 'edits')->findOrFail($id);
	}

	public function getBySlug($slug){
		return $this->project->with('aes', 'client', 'edits')->where('slug', '=', $slug)->first();
	}

	public function createRecord($input){
		//create Project
		$project = $this->project->create([
			// 'user_id' => $input['user_id'],
			'client_id' => $input['client_id'],
			'active' => $input['active'],
			'title' => $input['title'],
			'length' => $input['length'],
			'start_date' => $input['start_date'],
			'end_date' => $input['end_date'],
			'preproduction_date' => $input['preproduction_date'],
			'preproduction_start_time' => $input['preproduction_start_time'],
			'preproduction_end_time' => $input['preproduction_end_time'],
			'shoot_date' => $input['shoot_date'],
			'shoot_start_time' => $input['shoot_start_time'],
			'shoot_end_time' => $input['shoot_end_time'],
			'air_date' => $input['air_date'],
			'c_number' => $input['c_number'],
			'isci' => $input['isci'],
			'notes' => $input['notes'],
			'production_order' => $input['production_order'],
			'production_order_date' => $input['production_order_date']
		]);

		$client = $this->client->getById($input['client_id']);
		$aes = $client->aes->lists('id');
		$project->aes()->attach($aes);

		return $project;
	}

	public function updateRecord($input, $project){
		//update Project
		// $project->user_id = $input['user_id'];
		$project->client_id = $input['client_id'];
		$project->active = $input['active'];
		$project->title = $input['title'];
		// $project->slug = $input['slug'];
		$project->length = $input['length'];
		$project->start_date = $input['start_date'];
		$project->end_date = $input['end_date'];
		$project->preproduction_date = $input['preproduction_date'];
		$project->preproduction_start_time = $input['preproduction_start_time'];
		$project->preproduction_end_time = $input['preproduction_end_time'];
		$project->shoot_date = $input['shoot_date'];
		$project->shoot_start_time = $input['shoot_start_time'];
		$project->shoot_end_time = $input['shoot_end_time'];
		$project->air_date = $input['air_date'];
		$project->c_number = $input['c_number'];
		$project->isci = $input['isci'];
		$project->notes = $input['notes'];
		$project->production_order = $input['production_order'];
		$project->production_order_date = $input['production_order_date'];
		$project->save();

		return $project;
	}

	public function aesList(){
		$aes = new \Ae();
		return $aes->select('id', \DB::raw('CONCAT(first_name, " ", last_name) AS full_name'))
					->orderBy('first_name')
					->lists('full_name', 'id'); 
	}

	public function clientsList(){
		$clients = new \Client();
		return $clients->orderBy('name')->lists('name', 'id');
	}

}
