@extends('adminlte::page')
@section("titulo", "Detalle de venta ")
@section("content")
<div class="row">
    <div class="col-12">
    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mb-4">Detalles de la venta #{{$venta->id}}</h1>
            <div class="card">
                <div class="card-header">Información del cliente</div>
                <div class="card-body">
                    <h5 class="card-title">{{$venta->cliente->nombre}}</h5>
                   
                    <p class="card-text">Teléfono: {{$venta->cliente->telefono}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
        @include("notificaciones")
        <a class="btn btn-primary mb-3" href="{{route("ventas.index")}}">
            <i class="fas fa-arrow-left"></i>&nbsp;Volver
        </a>

        <h2>Productos</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($detalle_venta as $producto)
                    <tr>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->codigo}}</td>
                        <td>${{number_format($producto->precio, 2)}}</td>
                        <td>{{$producto->cantidad}}</td>
                        <td>${{number_format($producto->cantidad * $producto->precio, 2)}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"><strong>Total</strong></td>
                        <td>${{number_format($total, 2)}}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection