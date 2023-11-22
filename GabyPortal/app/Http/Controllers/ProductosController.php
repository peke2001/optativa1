<?php

namespace App\Http\Controllers;
use App\Models\Productos;
use App\Http\Controllers\ProductosControllers;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = productos::all();

        return view ('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


        return view ('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request-> validate(
            ['nombre'=> 'required',
            'precio'=> 'required',
            'categoria'=> 'required']
        );
        $producto = Productos::create($request->all());

        return redirect()->route('productos.edit',$producto)-> with('mensaje','El producto ha sido creado correctamente');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $productos = Productos::findOrFail($id);
        return view ('productos.edit', compact('productos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $productos = Productos::findOrFail($id);
        return view ('productos.edit', compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $productos = Productos::findOrFail($id);
        $request-> validate(
            ['nombre'=> 'required',
            'precio'=> 'required',
            'categoria'=> 'required']
        );
        $productos-> update($request->all());
        return redirect()->route('productos.edit', $id) ->with('mensaje','El producto ha sido editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $productos = Productos::findOrFail($id);
        $productos-> delete();
        return redirect()->route('productos.index')-> with('mensaje','El producto ha sido eliminado correctamente');

    }
}
