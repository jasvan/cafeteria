@extends('layouts.plantilla')


@section('contenidoPrincipal')
<div class="constainer-fluid">
  @foreach($productos as $item)
   <div class="card" style="width: 18rem;">  
    <div class="card-body">
     <h5 class="card-title">{{$item->nombre}}</h5>
     <h6 class="card-subtitle mb-2 text-muted">{{$item->categoria}}</h6>
       <p class="card-text">
       {{ $item->descripcion }} <p>Vendidos   {{ $item->vendidos }} </p>
       </p>              
      
       <form action="{{ route('producto.update', $item) }}" method="post">
          @csrf
          @method('patch')
          <button type="submit" class="btn btn-success btn-sm">Comprar</button>
        </form>
       </div>
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
                    </tr>
                </tbody>
            @endforeach
  </table>
</div>
  @endforeach
</div>
@endsection