<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VentasController extends Controller
{

    

    
    public function index()
    {
        $ventasConTotales = Venta::join("productos_vendidos", "productos_vendidos.id_venta", "=", "ventas.id")
            ->select("ventas.*", DB::raw("sum(productos_vendidos.cantidad * productos_vendidos.precio) as total"))
            ->groupBy("ventas.id", "ventas.created_at", "ventas.updated_at", "ventas.id_cliente")
            ->get();

        return view("ventas.ventas_index", ["ventas" => $ventasConTotales]);
    }

    public function show(Venta $venta)
    {
        $total = 0;
        foreach ($venta->productos as $producto) {
            $total += $producto->cantidad * $producto->precio;
        }
        return view("ventas.ventas_show", [
            "venta" => $venta,
            "detalle_venta" => $venta->productos, 
            "total" => $total,
        ]);
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();

        return redirect()->route("ventas.index")->with("mensaje", "Venta eliminada");
    }
}

