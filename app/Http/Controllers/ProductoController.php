<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('Articulos', compact('productos'));
    }
    public function venta()
    {
        $productos = Producto::paginate(6);
        return view('Ventas', compact('productos'));
    }
    public function vendidos()
    {
        $productos = Producto::paginate(6)
            ->where('vendidos', '!=', 0);        
        return view('ProductosVendidos', compact('productos'));
    
    }

    public function store(Request $request)
    {
        $producto = new Producto();
        
        $producto-> nombre = $request->nombre;
        $producto-> referencia = $request->referencia;
        $producto-> descripcion = $request->descripcion;
        $producto-> precio = $request->precio;
        $producto-> peso = $request->peso;
        $producto-> categoria = $request->categoria;
        $producto-> total = $request->total;
        
        $producto->save();        
        return redirect()->route('productos');
       
    }
        public function show($id)
    {
        $productos = Producto::find($id);
        return view('Productos', compact('productos'));
    }

    public function patch(Request $request, $id)
    {
        $productos = Producto::findOrFail($request->id);

        if($productos['total'] != 0){
        
            $productos->decrement('total');
            $productos->increment('vendidos'); 
        }else{
            session()->flash('msg', 'Producto agotado');
        }
        return redirect()->route('venta.producto');
    }

    public function update(Request $request, $id)
    {
        $productos = Producto::findOrFail($request->$id);
        $productos->nombre = $request->nombre;
        $productos->referencia = $request->referencia;
        $productos->descripcion = $request->descripcion;
        $productos->precio = $request->precio;
        $productos->peso = $request->peso;
        $productos->categoria = $request->categoria;
        $productos->total = $request->total;

        if ($productos->save()) {

            return redirect()->route('producto')->with('msg', 'producto actualizado');
        }
    }


    public function destroy($id)
    {
        $productos = Producto::destroy($id);
        return redirect()->route('productos');
    }
}
