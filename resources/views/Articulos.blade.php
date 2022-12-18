@extends('layouts.plantilla')


@section('content')

<div class="rounded-t-lg ">
  <div class="shadow-lg  bg-slate-50 pl-4 pb-2 pt-2 pr-4 ">
    <form action="{{ route('producto.store') }}" method="POST">
      @csrf
      <input type="text" name="nombre" class="rounded text-black-500 my-0.5" placeholder=" Nombre " />
      <input type="text" name="referencia" class="rounded text-black-500 my-0.5" placeholder=" Referencia" />
      <input type="text" name="descripcion" class="rounded text-black-500 my-0.5" placeholder=" Descripcion" />
      <input type="number" name="precio" class="rounded text-black-500 my-0.5" placeholder=" Precio" />
      <input type="text" name="peso" class="rounded text-black-500 my-0.5" placeholder=" Peso" />
      <input type="text" name="categoria" class="rounded text-black-500 my-0.5" placeholder=" Categoria" />
      <input type="int" name="total" class="rounded text-black-500 my-0.5" placeholder=" Stock" />

      <button 
        type="submit" 
        class="rounded text-white-500 my-0.5 bg-lime-600 pl-4 mx-2 my-2  pr-4 ">
         Guardar
      </button>

    </form>
  </div>
</div>

<hr class="my-2">

<div class="rounded-t-lg shadow-lg  bg-slate-50  pl-4 pb-2 pt-2 pr-4">
  <table class=" ">
    <thead class="text-gray-700">
      <tr>
        <th class="px-4 py-3">Nombre</th>
        <th class="px-4 py-3">Categoria</th>
        <th class="px-4 py-3">Refencia</th>
        <th class="px-4 py-3">Peso</th>
        <th class="px-4 py-3">Precio</th>
        <th class="px-4 py-3">Total</th>
        <th class="px-4 py-3">Opcion</th>
      </tr>
    </thead>
    @foreach ($productos as $item)
    <tbody>
      @if(session()->has('msg'))
            <p class="italic text-xs text-blue-900">{{ session('msg') }}</p>
        @endif
      <tr>
        <td class="px-7 py-1">{{ $item->nombre }}</td>
        <td class="px-7 py-1">{{ $item->categoria }}</td>
        <td class="px-7 py-1">{{ $item->referencia }}</td>
        <td class="px-7 py-1">{{ $item->peso }}</td>
        <td class="px-7 py-1">${{ $item->precio }}</td>
        <td class="px-7 py-1">{{ $item->total }}</td>
        <td class="px-7 py-1">
          <form action="{{ route('producto.destroy', $item) }}" method="post">
            @csrf
            @method('delete')
            <button class="lg:dark:content-auto" type="submit">
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