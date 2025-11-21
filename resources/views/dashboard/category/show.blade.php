
@extends('dashboard.master')
@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-bold text-gray-800 mb-4">DETALLE DE CATEGORIA</h2>
      <p class="text-lg mb-3">
            <span class="font-semibold text-gray-700">Título:</span>
            <span class="text-gray-900">{{ $category->title }}</span>
        </p>

        <p class="text-lg mb-3">
          <span class="font-semibold text-gray-700">Slug:</span>
          <span class="text-gray-900">{{ $category->slug }}</span>

        </p>

       {{-- Botón Volver --}}
        <a href="{{ route('categories.index') }}"
           class="inline-block mt-5 bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
            Volver
        </a>
 
    
</div>

@endsection