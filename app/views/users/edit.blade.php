<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit User</title>
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
	<h1>Edit Existing User</h1>
	{{Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT'])}}
		
		{{Form::text('first_name', $user->first_name, ['placeholder' => 'First Name'])}} <br><br>
		{{Form::text('last_name', $user->last_name, ['placeholder' => 'Last Name'])}} <br><br>
		{{Form::text('work_phone', null, ['placeholder' => 'Work Phone'])}} <br><br>
		{{Form::text('cell_phone', null, ['placeholder' => 'Cell Phone'])}} <br><br>
		{{Form::email('email', null, ['placeholder' => 'Email'])}} <br><br>
		{{--Form::text('password', null, ['placeholder' => 'Password'])--}} <br><br>
		{{Form::text('type', null, ['placeholder' => 'Type'])}} <br><br>
		{{Form::submit('Submit Form')}}
	{{Form::close()}}

    {{Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE'])}}
		{{Form::submit('Delete this Record')}}
    {{Form::close()}}

</body>
</html>

 <!-- Form::model($user, array('route' => array('user.update', $user->id))) -->