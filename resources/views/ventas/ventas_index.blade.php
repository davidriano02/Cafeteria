@extends('adminlte::page')
@section("titulo", "Ventas")
@section("content")
    <div class="row">
        <div class="col-12">
        <div class="row">
  <div class="col-12 text-center">
    <h1>Ventas <i class="bi bi-cart4"></i></h1>
  </div>
</div>
            @include("notificaciones")
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Total</th>
                        
                        <th>Detalles</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ventas as $venta)
                        <tr>
                            <td>{{$venta->created_at}}</td>
                            <td>{{$venta->cliente->nombre}}</td>
                            <td>${{$venta->total, 2}}</td>
                          
                            
    
    <td>
    <a class="btn btn-success" href="{{ route('ventas.show', $venta) }}">
        <i class="fa fa-info"></i> Detalles
    </a>
</td>
<td>
    <form action="{{ route('ventas.destroy', $venta) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta venta?')">
            <i class="fa fa-trash"></i> Eliminar
        </button>
    </form>
</td>
                        </tr>

                        
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
