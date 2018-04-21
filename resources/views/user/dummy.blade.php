<!DOCTYPE html>
<html>
<head>
	<title>Dummy Form</title>
</head>
<body>
	<form action="{{url('/user/dashboard/form')}}" method="POST">
		{{csrf_field()}}
		<input type="text" name="title" placeholder="Judul">
		<textarea name="description">
			
		</textarea>
		<input type="date" name="date">
		
		<select>
			@foreach($category as $c)
				<option value="{{$c->id}}">{{$c->name}}</option>
			@endforeach
		</select>
		<input type="number" name="lodger[0]" placeholder="penginap 1">
		<input type="number" placeholder="penginap 2" name="lodger[1]">
		<input type="number" name="lodger[2]" placeholder="penginap 3">
		<button type="submit">Submit</button>
	</form>
</body>
</html>