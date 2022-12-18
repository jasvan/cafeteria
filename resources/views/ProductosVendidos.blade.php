@extends('layouts.plantilla')
@section('content')

 <div class="rounded-t-lg shadow-lg  bg-slate-50  pl-4 pb-2 pt-2 pr-4">
  <table >
    <h3> LISTA DE PRODUCTOS VENDIDOS </h3>
    <thead class="text-gray-700">
      <tr>
        <th class="px-6 py-1">Nombre</th>
        <th class="px-6 py-1">Categoria</th>
        <th class="px-6 py-1">Refencia</th>
        <th class="px-6 py-1">Peso</th>
        <th class="px-6 py-1">Precio</th>
        <th class="px-6 py-1">vendidos</th>
        <th class="px-6 py-1">Total</th>
      </tr>
    </thead>
    @foreach ($productos as $item)   
    <tbody>
      <tr>
        <td class="px-6 py-1">{{ $item->nombre }}</td>
        <td class="px-6 py-1">{{ $item->categoria }}</td>
        <td class="px-6 py-1">{{ $item->referencia }}</td>
        <td class="px-6 py-1">{{$item->peso}}</td>
        <td class="px-6 py-1">${{ $item->precio}}</td>
        <td class="px-6 py-1">{{ $item->vendidos }}</td>
        <td class="px-6 py-1">{{ $item->total }}</td>
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
@endsection