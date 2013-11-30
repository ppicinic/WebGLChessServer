<html>
	<head>
		<title>WebGL Chess Server</title>
	</head>
	<body>
		<p>This is a sudo chess server that can play out Kasparov vs Topalov 1999.</p>
		<p>
			@foreach($errors->all() as $error)
			{{$error}}<br/>
			@endforeach
		</p>
		<form action="." method="POST">
			<label>Moves: </label>
			<input type="number" id="moves" name="moves" value='{{Input::old('moves')}}' placeholder="0"/><br />
			<input type="submit" id="submit" name="submit" value="Add moves"/>
		</form>
		<form action="/startgame" method="POST">
			<input type="submit" id="submit" name="submit" value="Restart Game"/>
		</form>
	</body>
</html>