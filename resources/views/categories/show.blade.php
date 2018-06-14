@extends('layouts.app')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<!--- Lo unico que va hacer la vista show es mostrar la categoria name--->
		<h1>{{ $category->name }}. <small>Categoria creada el dia {{ $category->created_at->format('d-m-y') }}</small></h1>
		
		@if ($category->image)
		<!--- El asset es la ruta de la imagen--->
			<a href="{{asset($category->image)}}" class="thumbnail" target="_blank">
				<img src="{{ asset($category->image) }}">
			</a>
		@endif	
	</div>

@endsection