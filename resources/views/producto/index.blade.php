@extends('adminlte::page')

@section('title', 'Konecta')

@section('content_header')
    <h1>Listado de Productos</h1>
@stop

@section('content')
<a href="productos/create" class="btn btn-primary mb-3">CREAR</a>

<table id="productos" class="table table-striped table-bordered shadow-lg mt-4">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Código</th>
            <th scope="col">Nombre</th>
            <th scope="col">Categoría</th>
            <th scope="col">Peso</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productos as $producto)
        <tr>
            <td>{{ $producto->id}}</td>
            <td>{{$producto->codigo}}</td>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->categorias->descripcion}}</td>
            <td>{{$producto->peso}}</td>
            <td>{{$producto->precio}}</td>
            <td>{{$producto->stock}}</td>
            <td>
                <form action="{{ route ('productos.destroy',$producto->id)}}" method="POST">
                <a href="/productos/{{ $producto->id}}/edit" class="btn btn-info btn-sm">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
@stop