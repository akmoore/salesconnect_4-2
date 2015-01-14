<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update Account Executive</title>
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
	<h1>Update Account Executive</h1>
	{{Form::model($ae,['route' => ['aes.update', $ae->id], 'method' => 'PUT'])}}
		{{Form::text('first_name', null, ['placeholder' => 'First Name'])}} <br><br>
		{{Form::text('last_name', null, ['placeholder' => 'Last Name'])}} <br><br>
		{{Form::text('work_phone', null, ['placeholder' => 'Work Phone'])}} <br><br>
		{{Form::text('cell_phone', null, ['placeholder' => 'Cell Phone'])}} <br><br>
		{{Form::email('email', null, ['placeholder' => 'Email'])}} <br><br>

		{{Form::submit('Submit Form')}}
	{{Form::close()}}
</body>
</html>