<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(6);        
        return view('Articulos', compact('productos'));     
    }

    public function venta()
    {
        $productos = Producto::paginate(6);        
        return view('Ventas', compact('productos'));     
    }

    public function store(Request $request)
    {
        $productos = new Producto();
        $productos-> nombre = $request->nombre;
        $productos-> referencia = $request->referencia;
        $productos-> descripcion = $request->descripcion;
        $productos-> precio = $request->precio;
        $productos-> peso = $request->peso;
        $productos-> categoria = $request->categoria;
        $productos-> total = $request->total; 
        $productos-> vendidos = $request->vendidos; 
        $productos-> save();
        return $productos;
    }

    
    public function show($id)
    {
        $productos = Producto::find($id);
        return view('Productos', compact('productos'));
    }

    public function edit(Request $request, $id)
    {
         $productos = Producto::findOrFail($request->id)
         ->where('total', '>=', '0');   
         $productos->decrement('total');
         $productos->increment('vendidos');
         $productos-> get();
         return view('Ventas', compact('productos'));
    }

    public function update(Request $request, $id)
    {
        $productos = Producto::findOrFail($request->id);
        $productos-> nombre = $request->nombre;
        $productos-> referencia = $request->referencia;
        $productos-> descripcion = $request->descripcion;
        $productos-> precio = $request->precio;
        $productos-> peso = $request->peso;
        $productos-> categoria = $request->categoria;
        $productos-> total = $request->total;  
        $productos-> save();

        return $productos;

    }


    public function destroy($id)
    {
        $productos = Producto::destroy($id);
        return redirect()->route('productos');
    }
}
