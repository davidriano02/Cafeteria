<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\ProductoVendido;
use App\Models\Venta;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VenderController extends Controller
{

    public function terminarOCancelarVenta(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->terminarVenta($request);
        } else {
            return $this->cancelarVenta();
        }
    }

    public function terminarVenta(Request $request)
    {
        // Crear una venta
        $venta = new Venta();
        $venta->id_cliente = $request->input("id_cliente");
        $venta->saveOrFail();
        $idVenta = $venta->id;
        $productos = $this->obtenerProductos();
        // Recorrer carrito de compras
        foreach ($productos as $producto) {
            // El producto que se vende...
            $productoVendido = new ProductoVendido();
            $productoVendido->fill([
                "id_venta" => $idVenta,
                "nombre" => $producto->nombre,
                "codigo" => $producto->codigo,
                "precio" => $producto->precio,
                "cantidad" => $producto->cantidad,
            ]);
            // Lo guardamos
            $productoVendido->saveOrFail();
            // Y restamos la existencia del original
            $productoActualizado = Producto::find($producto->id);
            $productoActualizado->stock -= $productoVendido->cantidad;
            $productoActualizado->saveOrFail();
        }
        $this->vaciarProductos();
        return redirect()
            ->route("vender.index")
            ->with("mensaje", "Venta terminada");
    }

    private function obtenerProductos()
    {
        $productos = session("productos");
        if (!$productos) {
            $productos = [];
        }
        return $productos;
    }

    private function vaciarProductos()
    {
        $this->guardarProductos(null);
    }

    private function guardarProductos($productos)
    {
        session(["productos" => $productos,
        ]);
    }

    public function cancelarVenta()
    {
        $this->vaciarProductos();
        return redirect()
            ->route("vender.index")
            ->with("mensaje", "Venta cancelada");
    }

    public function quitarProductoDeVenta(Request $request)
    {
        $indice = $request->input("indice");
        $productos = $this->obtenerProductos();
        array_splice($productos, $indice, 1);
        $this->guardarProductos($productos);
        return redirect()
            ->route("vender.index");
    }

    public function agregarProductoVenta(Request $request)
    {
        $codigobar = $request->POST("codigobar");
        $producto = Producto::where("codigo", "=", $codigobar)->first();
        if (!$producto) {
            return redirect()
                ->route("vender.index")
                ->with("mensaje", "Producto no encontrado");
        }
        $this->agregarProductoACarrito( $request,$producto);
        return redirect()
            ->route("vender.index");
    }

    private function agregarProductoACarrito( $request ,$producto)
    {
        if ($producto->stock <= 0) {
            return redirect()->route("vender.index")
                ->with([
                    "mensaje" => "No hay existencias del producto",
                    "tipo" => "danger"
                ]);
        }
        $productos = $this->obtenerProductos();
        $posibleIndice = $this->buscarIndiceDeProducto($producto->codigo, $productos);
        // Es decir, producto no fue encontrado
        if ($posibleIndice === -1) {
            $producto->cantidad = 1;
            array_push($productos, $producto);
        } else {
            if ($productos[$posibleIndice]->cantidad + 1 > $producto->stock) {
                return redirect()->route("vender.index")
                    ->with([
                        "mensaje" => "No se pueden agregar más productos de este tipo, se quedarían sin existencia",
                        "tipo" => "danger"
                    ]);
            }
            $productos[$posibleIndice]->cantidad++;
        }
        // guardar la información del cliente en la sesión
        session(["productos" => $productos, "cliente" => Cliente::find($request->input("id_cliente"))]);
    }

    private function buscarIndiceDeProducto(string $codigo, array & $productos)
    {
        foreach ($productos as $indice => $producto) {
            if ($producto->codigo === $codigo) {
                return $indice;
            }
        }
        return -1;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $total = 0;
    foreach ($this->obtenerProductos() as $producto) {
        $total += $producto->cantidad * $producto->precio;
    }
    $cliente = session("cliente"); // obtener información del cliente de la sesión
    return view("vender.vender",
        [
            "total" => $total,
            "clientes" => Cliente::all(),
            "cliente" => $cliente // pasar la información del cliente a la vista
        ]);
    }

    
}
