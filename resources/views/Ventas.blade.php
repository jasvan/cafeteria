@extends('layouts.plantilla')


@section('content')

<div class="">
        @if(session()->has('msg'))
            <p class="italic text-xs text-blue-900">{{ session('msg') }}</p>
        @endif
        
  @foreach($productos as $item)
  <div class="float-left card  my-0.5 mx-0.5" style="width: 18rem;">
    <div class="card-body rounded-b-lg shadow-md pl-4 pb-2 pt-2 pr-4 bg-slate-50">
      <h5 class="card-title">{{$item->nombre}}</h5>
      <h6 class="card-subtitle mb-2 text-muted">{{$item->categoria}}</h6>
      <p class="card-text">
        {{ $item->descripcion }}
      <p>Vendidos {{ $item->vendidos }} </p>
      </p>
      <form action="{{ route('producto.patch', $item) }}" method="post">
        @csrf
        @method('patch')
        <button 
          type="submit" 
          class="bg-lime-600 text-white-600 pl-1 pb-0.2 pt-0.2 pr-1">
          Comprar
        </button>
      </form>
    </div>
  </div>
  @endforeach
</div>
@endsection

