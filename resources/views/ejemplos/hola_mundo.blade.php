@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>($titulo)</title>
</head>
<body>
	@if($variable)
	<h1>HOLA</h1>
	@else
	<h1>CHAO</h1>
	@endif
	<br>
	<h1>MUNDO</h1>

	<table>
		<thead>
			<th> 
				ID
			</th>
		</thead>>
		<tbody>
			
	</table>

</body>
</html>

@endsection