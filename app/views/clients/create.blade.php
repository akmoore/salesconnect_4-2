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
	{{Form::open(['route' => 'clients.store'])}}
		{{Form::select('ae_id[]', $aes, null, ['multiple'])}} <br><br>
		{{Form::select('agency_id', $agencies)}} <br><br>
		{{Form::text('name', '', ['placeholder' => 'Company\'s Name'])}} <br><br>

		{{Form::text('primary_contact_first_name', '', ['placeholder' => 'Contact\'s First Name'])}} <br><br>
		{{Form::text('primary_contact_last_name', '', ['placeholder' => 'Contact\'s Last Name'])}} <br><br>
		{{Form::text('street', '', ['placeholder' => 'Street'])}} <br><br>
		{{Form::text('city', '', ['placeholder' => 'City'])}} <br><br>
		{{Form::text('state', 'Louisiana', ['placeholder' => 'State'])}} <br><br>
		{{Form::text('postal', '', ['placeholder' => 'Postal Code'])}} <br><br>
		{{Form::text('public_phone', '', ['placeholder' => 'Public Phone'])}} <br><br>
		{{Form::text('primary_contact_phone', '', ['placeholder' => 'Contact\'s Phone'])}} <br><br>
		{{Form::text('primary_contact_email', '', ['placeholder' => 'Contact\'s Email'])}} <br><br>
		{{Form::text('url', '', ['placeholder' => 'Website'])}} <br><br>

		{{Form::submit('Submit Form')}}
	{{Form::close()}}
</body>
</html>
