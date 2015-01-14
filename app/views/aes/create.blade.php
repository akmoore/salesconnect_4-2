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
	{{Form::open(['route' => 'aes.store'])}}
		{{Form::text('first_name', '', ['placeholder' => 'First Name'])}} <br><br>
		{{Form::text('last_name', '', ['placeholder' => 'Last Name'])}} <br><br>
		{{Form::text('work_phone', '', ['placeholder' => 'Work Phone'])}} <br><br>
		{{Form::text('cell_phone', '', ['placeholder' => 'Cell Phone'])}} <br><br>
		{{Form::email('email', '', ['placeholder' => 'Email'])}} <br><br>

		{{Form::submit('Submit Form')}}
	{{Form::close()}}
</body>
</html>