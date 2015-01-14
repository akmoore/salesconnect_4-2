<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Project</title>
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
	<h1>Create a New Project</h1>
	{{Form::open(['route' => 'projects.store'])}}
		
		{{Form::select('client_id', $clients)}} <br><br>
		{{Form::text('title', '', ['placeholder' => 'Title of Project'])}} <br><br>
		{{Form::select('active', [0 => 'Not Active', 1 => 'Active'], 1)}} <br><br>
		{{Form::select('length', [30 => '30 seconds', 15 => '15 seconds'])}} <br><br>
		{{Form::text('start_date', '', ['placeholder' => 'Project Start Date'])}} <br><br>
		{{Form::text('end_date', '', ['placeholder' => 'Project End Date'])}} <br><br>
		{{Form::text('preproduction_date', '', ['placeholder' => 'Pre-Production Date'])}} <br><br>
		{{Form::text('preproduction_start_time', '', ['placeholder' => 'Pre-Production Start Time'])}} <br><br>
		{{Form::text('preproduction_end_time', '', ['placeholder' => 'Pre-Production End Time'])}} <br><br>
		{{Form::text('shoot_date', '', ['placeholder' => 'Shoot Date'])}} <br><br>
		{{Form::text('shoot_start_time', '', ['placeholder' => 'Shoot Start Time'])}} <br><br>
		{{Form::text('shoot_end_time', '', ['placeholder' => 'Shoot End Time'])}} <br><br>
		{{Form::text('air_date', '', ['placeholder' => 'Expected Air Date'])}} <br><br>
		{{Form::text('c_number', '', ['placeholder' => 'Commercial / Promo Number'])}} <br><br>
		{{Form::text('isci', '', ['placeholder' => 'Ad Id'])}} <br><br>
		{{Form::select('production_order', [1 => 'Recieved', 0 => 'Did Not Recieved'], 0 )}} <br><br>
		{{Form::input('date', 'production_order_date', '', ['placeholder' => 'Date PO was Recieved', 'type' => 'date'])}} <br><br>
		{{Form::textarea('notes', '', ['placeholder' => 'Got Notes?'])}}

		{{Form::submit('Submit Form')}}
	{{Form::close()}}
</body>
</html>