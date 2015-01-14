<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Project</title>
</head>
<style>
	input:focus,
	select:focus,
	textarea:focus,
	button:focus {
	    outline: none;
	}
</style>
<body>
	<h1>Edit Project</h1>
	{{Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'PUT'])}}
		
		{{Form::select('client_id', $clients)}} <br><br>

		{{Form::text('title', null, ['placeholder' => 'Title of Project'])}} <br><br>
		{{Form::select('active', [0 => 'Not Active', 1 => 'Active'])}} <br><br>
		{{Form::select('length', [30 => '30 seconds', 15 => '15 seconds'])}} <br><br>
		{{Form::text('start_date', null, ['placeholder' => 'Project Start Date'])}} <br><br>
		{{Form::text('end_date', null, ['placeholder' => 'Project End Date'])}} <br><br>
		{{Form::text('preproduction_date', null, ['placeholder' => 'Pre-Production Date'])}} <br><br>
		{{Form::text('preproduction_start_time', null, ['placeholder' => 'Pre-Production Start Time'])}} <br><br>
		{{Form::text('preproduction_end_time', null, ['placeholder' => 'Pre-Production End Time'])}} <br><br>
		{{Form::text('shoot_date', null, ['placeholder' => 'Shoot Date'])}} <br><br>
		{{Form::text('shoot_start_time', null, ['placeholder' => 'Shoot Start Time'])}} <br><br>
		{{Form::text('shoot_end_time', null, ['placeholder' => 'Shoot End Time'])}} <br><br>
		{{Form::text('air_date', null, ['placeholder' => 'Expected Air Date'])}} <br><br>
		{{Form::text('c_number', null, ['placeholder' => 'Commercial / Promo Number'])}} <br><br>
		{{Form::text('isci', null, ['placeholder' => 'Ad Id'])}} <br><br>
		{{Form::select('production_order', [1 => 'Recieved', 0 => 'Did Not Recieved'])}} <br><br>
		{{Form::input('date', 'production_order_date', null, ['placeholder' => 'Date PO was Recieved', 'type' => 'date'])}} <br><br>
		{{Form::textarea('notes', null, ['placeholder' => 'Got Notes?'])}}

		{{Form::submit('Submit Form')}}
	{{Form::close()}}
</body>
</html>