<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(5);        
        return view('Articulos', compact('productos'));     
    }

    public function venta()
    {
        $productos = Producto::paginate(5);        
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
        $productos-> save();       
    }

    
    public function show($id)
    {
        $productos = Producto::find($id);
        return view('Productos', compact('producto'));
    }

    public function edit(Request $request, $id)
    {
         $productos = Producto::findOrFail($request->id);   
         $productos->decrement('total');
         $productos->increment('vendidos');
         $productos-> save();
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
