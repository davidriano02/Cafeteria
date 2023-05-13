@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
   <h1>Crear Producto</h1>
@stop

@section('content')
    
@if($errors->any())
    <div class="alert alert-dark alert-dismissible fade show" role="alert">
     <strong>¡Revise Los Campos!</strong>
        @foreach ($errors-all() as $error)
            <span class ="badge badge-danger">{{$error}}</span>
        @endforeach
        <button type="button" class="close" data-dismiss="alerta" aria-label="close">
          <span aria-hidden="true">&times;</span>  
        </button>  
    </div>  
    @endif

    {!! Form::model($producto, ['method'=>'PUT', 'route'=>['productos.update', $producto->id]]) !!}
            
    <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            {{ Form::label('Codigo') }}
            {{ Form::text('codigo', $producto->codigo, ['class' => 'form-control' . ($errors->has('codigo') ? ' is-invalid' : ''), 'placeholder' => 'codigo']) }}
            {!! $errors->first('codigo', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12"> 
            <div class="form-group">
            {{ Form::label('id_categoria') }}
            {{ Form::Select('id_categoria', $categorias, $producto->id_categoria, ['class' => 'form-control' . ($errors->has('id_categoria') ? ' is-invalid' : ''), 'placeholder' => ' Categorias']) }}
            {!! $errors->first('id_categoria', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
        </div> 
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            {{ Form::label('Peso') }}
            {{ Form::number('peso', $producto->peso, ['class' => 'form-control' . ($errors->has('peso') ? ' is-invalid' : ''), 'placeholder' => 'peso']) }}
            {!! $errors->first('peso', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            {{ Form::label('Precio') }}
            {{ Form::number('precio', $producto->precio, ['class' => 'form-control' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
            </div> 
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