@extends('adminlte::page')

@section('title', 'Konecta')

@section('content_header')
<h1 class="mb-4 text-center">
    <span class="font-weight-bold text-primary">Nueva venta</span>
    <i class="fa fa-shopping-cart fa-lg ml-2 text-success"></i>
</h1>
@stop

@section("content")
<div class="row">
    <div class="col-12">

        @include("notificaciones")
        <div class="row">

            <div class="col-12 col-md-6">
                <form action="{{route('agregarProductoVenta')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="codigobar">Código</label>
                        <div class="input-group">
                            <input id="codigobar" autocomplete="off" required autofocus name="codigobar" type="text" class="form-control" placeholder="Código">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <form action="{{route('terminarOCancelarVenta')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="id_cliente">Selecione el Cliente y Oprima terminar</label>
                        <select required class="form-control" name="id_cliente" id="id_cliente">
                            @foreach($clientes as $cliente)
                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if(session("productos") !== null)
                    <div class="form-group">
                        <button name="accion" value="terminar" type="submit" class="btn btn-success mr-2">Terminar venta</button>
                        <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar venta</button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
        @if(session("productos") !== null)
        <h2 class="mt-4">Total: ${{number_format($total, 2)}}</h2>
        <div class="table-responsive mt-4">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Código de barras</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session("productos") as $producto)
                    <tr>
                        <td>{{$producto->codigo}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>${{number_format($producto->precio, 2)}}</td>
                        <td>{{$producto->cantidad}}</td>
                        <td>
                            <form action="{{route('quitarProductoDeVenta')}}" method="POST">
                                @method("delete")
                                @csrf
                                <input type="hidden" name="indice" value="{{$loop->index}}">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="d-flex justify-content-center align-items-center flex-column">
            <h2 class="text-center mb-4">Aquí aparecerán los productos de la venta</h2>

        </div>
        @endif
    </div>
</div>
@stop


@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<script src="{{ asset('js/adminlte.min.js') }}"></script>
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop