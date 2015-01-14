<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Create Agency</title>
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
	<h1>Create a New Agency</h1>
	{{Form::open(['route' => 'agencies.store'])}}
		{{Form::text('name', null, ['placeholder' => 'Company Name'])}} <br><br>
		{{Form::text('contact_first_name', null, ['placeholder' => 'Contact First Name'])}} <br><br>
		{{Form::text('contact_last_name', null, ['placeholder' => 'Contact Last Name'])}} <br><br>
		{{Form::text('contact_email', null, ['placeholder' => 'Contact Email'])}} <br><br>
		{{Form::text('contact_phone', null, ['placeholder' => 'Contact Phone'])}} <br><br>
		{{Form::submit('Create Agency')}}
	{{Form::close()}}
</body>
</html>
