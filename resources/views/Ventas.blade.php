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

      
  @endforeach
</div>
@endsection