@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
   <h1>Crear Producto</h1>
@stop

@section('content')
    
<form method="POST" action="{{ route('productos.store') }}">
    @csrf
    
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="codigo" class="form-label">Código</label>
            <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1">    
        </div>
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2">
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select class="form-select" id="id_categoria" name="id_categoria" required>
                @foreach($categorias as $id => $descripcion)
                    <option value="{{ $id }}">{{ $descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label for="peso" class="form-label">Peso</label>
            <div class="input-group">
                <input id="peso" name="peso" type="number" step="any" value="0.00" class="form-control" tabindex="3">
                <span class="input-group-text">kg</span>
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="precio" class="form-label">Precio</label>
            <div class="input-group">
                <span class="input-group-text">$</span>
                <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" tabindex="4">
            </div>
        </div>
        <div class="col-md-6">
            <label for="stock" class="form-label">Stock</label>
            <div class="input-group">
                <input id="stock" name="stock" type="number" step="any" value="0.00" class="form-control" tabindex="5">
                <span class="input-group-text">unidades</span>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-end">
        <a href="/productos" class="btn btn-secondary me-2" tabindex="6">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="7">Guardar</button>
    </div>
    
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop