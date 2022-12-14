@extends('layouts.plantilla')


@section('contenidoPrincipal')   
    <div class="constainer-fluid position-relative">
      <form action="{{ route('producto.store') }}" method="POST"> 
        @csrf     
        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <label for="nombre" class="col-form-label">Nombre</label>
          </div>
          <div class="col-auto">
            <input 
              id="nombre" 
              type="text" 
              name="nombre" 
              class="form-control form-control-sm" 
              aria-describedby="nombre producto"
              >
          </div>          
        </div>

        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <label for="referencia" class="col-form-label">Referencia</label>
          </div>
          <div class="col-auto">            
            <input 
              id="referencia"
              type="text"   
              name="referencia" 
              class="form-control form-control-sm" 
              aria-label=".form-control-sm example"
              >
          </div>          
        </div>

        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <label for="descripcion" class="col-form-label">Descripcion</label>
          </div>
          <div class="col-auto">            
            <input 
              id="descripcion"
              type="text"   
              name="descripcion" 
              class="form-control form-control-sm" 
              aria-label=".form-control-sm example"
              >
          </div>          
        </div>

        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <label for="peso" class="col-form-label">Peso</label>
          </div>
          <div class="col-auto">            
            <input 
            id="peso"
            type="text" 
            name="peso" 
            class="form-control form-control-sm" 
            aria-label=".form-control-sm example">
          </div>          
        </div>

          <div class="row g-3 align-items-center">
            <div class="col-auto">
              <label for="precio" class="col-form-label">Precio</label>
            </div>
          

          <div class="col-auto">            
            <input 
            id="precio"
            type="text" 
            name="precio" 
            class="form-control form-control-sm" 
            aria-label=".form-control-sm example">
          </div>          
        </div>

        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <label for="categoria" class="col-form-label">Categoria</label>
          </div>
          <div class="col-auto">            
            <input 
            id="categoria"
            type="text" 
            name="categoria" 
            class="form-control form-control-sm" 
            aria-label=".form-control-sm example">
          </div>          
        </div>

        <div class="row g-3 align-items-center">
          <div class="col-auto">
            <label for="total" class="col-form-label">Total</label>
          </div>
          <div class="col-auto">            
            <input 
            id="total"
            type="text" 
            name="total" 
            class="form-control form-control-sm" 
            aria-label=".form-control-sm example">
          </div>          
        </div>
            <button 
              class="btn btn-sm btn-outline-secondary align-items-center" 
              type="submit">
              Guardar
            </button>       
      </form>
</div>
<div class="container-fluid md">
  <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Refencia</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total</th>
                    <th scope="col">Opcion</th>
                </tr>
            </thead>
            @foreach ($productos as $item)            
                <tbody>
                    <tr>
                        <th>{{ $item->nombre }}</th>
                        <td>{{ $item->categoria }}</td>
                        <td>{{ $item->referencia }}</td>
                        <td>{{ $item->peso }}</td>
                        <td>$ {{ $item->precio }}</td>
                        <td>{{ $item->total }}</td>
                        <td>
                            <form action="{{ route('producto.destroy', $item) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-outline-danger " type="submit">
                                    Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            @endforeach
  </table>
</div>
@endsection
