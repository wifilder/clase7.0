<!--- En nuestra vista de categorias vamos a extender ese layout que acabamos de crear que es app.blade.php -
-->
@extends('layouts.app')

<!--- Y vamos a meter informacion en la seccion content, solo va a tener dos campos nombre y imagen --->
@section('content')
<!--- Para que ocupe 6 columnas de 12 y este sentrado un offset de 3 --->
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<div class="panel-body">
				<h1>Nueva categoria</h1>
			<!--- En la lista de rutas nos nombre el metodo POST y la accion que es categories.store donde almacenaria lo verificamos poniendo el comando php artisan route:list --->
			<!--- Los formularios deben tener un atributo especial para decirle que va a enviar archivos enctype="multipart/form-data" --->
				<form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
					<!--- Agrega un nuevo campo de tipo hidden con valor que es token se puede ver en middleware kernel con eso le decimos que es seguro a laravel --->
					{{ csrf_field()}}
					<!--- Si hay un error en la clase name va agregar un error has-error de boostrap si no hay un error va a colocar comillas vacias --->
					<div class="form-group{{$errors->has('name') ? 'has-error' : ''}}">
						<label for="name">Nombre de la categoria</label>
					<!--- el for para el campo name y un id igual que el atributo name y un placeholder --->
						<input type="text" name="name" id="name" class="form-control" placeholder="Nombre de la categoria" value="{{ old('name') }}">
					
					<!--- Para ver cual validaciones no pasaron, si hay un error para el campo name entonces mostramos un span llamado de clase help-block y obtenemos el primer error con error fist  --->
						@if($errors->has('name'))
							<span class="help-block">
								<strong>{{$errors->first('name')}}</strong>
							</span>
						@endif
					</div>

					<div class="form-group{{$errors->has('image') ? 'has-error' : ''}}">
						<label for="image">Imagen:</label>
						<input type="file" name="image" id="image">
					</div>

						@if($errors->has('image'))
							<span class="help-block">
								<strong>{{$errors->first('image')}}</strong>
							</span>
						@endif

					<button type="submit" class="btn btn-primary">Guardar</button>
				</form>
			</div>
		</div>
	</div>
@endsection