<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $productos = Producto::all();
            return view('producto.index')->with('productos',$productos);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::pluck('descripcion', 'id');
    return view('producto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'codigo' => 'required',
        'nombre' => 'required',
        'id_categoria' => 'required',
        'peso' => 'required',
        'precio' => 'required',
        'stock' => 'required',
    ]);

    $producto = new Producto();

    $producto->codigo = $request->get('codigo');
    $producto->nombre = $request->get('nombre');
    $producto->id_categoria = $request->get('id_categoria');
    $producto->peso = $request->get('peso');
    $producto->precio = $request->get('precio');
    $producto->stock = $request->get('stock');
    $producto->save();

    return redirect('/productos')->with('success', 'Producto creado correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $producto = Producto::find($id);
        
        $categorias = Categoria::pluck('descripcion', 'id');
    
   
        return view('producto.edit', compact('producto', 'categorias'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',           
            'id_categoria' => 'required|exists:categorias,id',          
            'peso' => 'required',           
            'precio' => 'required',           
            'stock' => 'required',
                   ]);
        $producto =  Producto::find($id);

        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->id_categoria = $request->get('id_categoria');
        $producto->peso = $request->get('peso');
        $producto->precio = $request->get('precio');
        $producto->stock = $request->get('stock');
        $producto->save();

        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
