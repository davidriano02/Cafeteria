@extends('adminlte::page')

@section('title', 'Konecta')

@section('content_header')
   <h1>Crear Producto</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>¡Revise los campos!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                {!! Form::model($producto, ['method'=>'PUT', 'route'=>['productos.update', $producto->id]]) !!}
                <div class="card">
                    <div class="card-header">
                        Editar producto
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {{ Form::label('codigo', 'Código') }}
                            {{ Form::text('codigo', $producto->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'Código', 'readonly' => 'readonly']) }}
                            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('nombre', 'Nombre') }}
                            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
                            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('id_categoria', 'Categoría') }}
                            {{ Form::Select('id_categoria', $categorias, $producto->id_categoria, ['class' => 'form-control' . ($errors->has('id_categoria') ? ' is-invalid' : ''), 'placeholder' => 'Categoría']) }}
                            {!! $errors->first('id_categoria', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('peso', 'Peso') }}
                            {{ Form::number('peso', $producto->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'Peso']) }}
                            {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('precio', 'Precio') }}
                            {{ Form::number('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
                            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            {{ Form::label('Stock') }}
            {{ Form::number('stock', $producto->stock, ['class' => 'form-control' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'stock']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <div class="form-group">
            {{ Form::label('Fecha') }}
            {{ Form::date('created_at', $producto->created_at, ['class' => 'form-control' . ($errors->has('created_at') ? ' is-invalid' : ''), 'placeholder' => 'created_at']) }}
            {!! $errors->first('created_at', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
        </div> 
        
        

        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <div class="form-group">
                <button type=submit class="btn btn-primary">Guardar</button>
            </div> 
        </div> 
        
    </div>   
           
           
    {!! Form::close() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop