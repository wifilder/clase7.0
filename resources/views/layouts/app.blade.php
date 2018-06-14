<!--- Este codigo se va a repetir en todas las paginas ---->
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=nom initial-scale=1.0,
		maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>EDcurso</title>
	<!-- Recuerden que asset toma como raiz esta carpeta llamada public -->
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	@include('partials.menu')

	<div class="container">
	<!-- Necesitamos un campo donde vamos a ingresar informacion content -->
		@yield('content')
	</div>
</body>
</html>
