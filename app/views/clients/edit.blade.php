<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Client</title>
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
	<h1>Create a New Client</h1>
	{{Form::model($client, ['route' => ['clients.update', $client->id], 'method' => 'PUT'])}}
		
		<?php $selected = explode(',', $client->users);?>

		{{Form::select('user_id[]', $users, $selectedUsers, ['multiple'])}} <br><br>

		{{Form::select('agency_id', $agencies)}} <br><br>
		{{Form::text('name', null, ['placeholder' => 'Company\'s Name'])}} <br><br>

		{{Form::text('primary_contact_first_name', null, ['placeholder' => 'Contact\'s First Name'])}} <br><br>
		{{Form::text('primary_contact_last_name', null, ['placeholder' => 'Contact\'s Last Name'])}} <br><br>
		{{Form::text('street', null, ['placeholder' => 'Street'])}} <br><br>
		{{Form::text('city', null, ['placeholder' => 'City'])}} <br><br>
		{{Form::text('state', null, ['placeholder' => 'State'])}} <br><br>
		{{Form::text('postal', null, ['placeholder' => 'Postal Code'])}} <br><br>
		{{Form::text('public_phone', null, ['placeholder' => 'Public Phone'])}} <br><br>
		{{Form::text('primary_contact_phone', null, ['placeholder' => 'Contact\'s Phone'])}} <br><br>
		{{Form::text('primary_contact_email', null, ['placeholder' => 'Contact\'s Email'])}} <br><br>
		{{Form::text('url', null, ['placeholder' => 'Website'])}} <br><br>

		{{Form::submit('Submit Form')}}
	{{Form::close()}}
</body>
</html>

