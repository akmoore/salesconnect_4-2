<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Agency</title>
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
	<h1>Edit Existing Agency</h1>
	{{Form::model($agency, ['route' => ['agencies.update', $agency->id], 'method' => 'PUT'])}}
		
		{{Form::text('name', null, ['placeholder' => 'Compancy\'s Name'])}} <br><br>
		{{Form::text('contact_first_name', null, ['placeholder' => 'Contact First Name'])}} <br><br>
		{{Form::text('contact_last_name', null, ['placeholder' => 'Contact Last Name'])}} <br><br>
		{{Form::email('contact_email', null, ['placeholder' => 'Contact Email'])}} <br><br>
		{{Form::text('contact_phone', null, ['placeholder' => 'Contact Phone'])}} <br><br>
		{{Form::submit('Submit Form')}}

	{{Form::close()}}

    {{Form::open(['route' => ['agencies.destroy', $agency->id], 'method' => 'DELETE'])}}
		{{Form::submit('Delete this Record')}}
    {{Form::close()}}

</body>
</html>