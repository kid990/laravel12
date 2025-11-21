@extends('dashboard.master')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Detalle de Post</h2>

    {{-- Título --}}
    <div class="mb-4">
        <span class="font-semibold text-gray-700">Título:</span>
        <span class="text-gray-900">{{ $post->title }}</span>
    </div>

    {{-- Slug --}}
    <div class="mb-4">
        <span class="font-semibold text-gray-700">Slug:</span>
        <span class="text-gray-900">{{ $post->slug }}</span>
    </div>

    {{-- Imagen --}}
    <div class="mb-4">
        <span class="font-semibold text-gray-700">Imagen:</span><br>

        @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}"
                 alt="{{ $post->title }}"
                 class="mt-2 rounded-lg shadow max-w-sm">
        @else
            <p class="text-gray-500 italic mt-1">Sin imagen</p>
        @endif
    </div>

    {{-- Descripción --}}
    <div class="mb-4">
        <span class="font-semibold text-gray-700">Descripción:</span>
        <p class="text-gray-900 mt-1">{{ $post->description }}</p>
    </div>

    {{-- Contenido --}}
    <div class="mb-4">
        <span class="font-semibold text-gray-700">Contenido:</span>
        <p class="text-gray-900 whitespace-pre-line mt-1">{{ $post->content }}</p>
    </div>

    {{-- Categoría --}}
    <div class="mb-4">
        <span class="font-semibold text-gray-700">Categoría:</span>
        <span class="text-gray-900">{{ $post->category->title ?? 'Sin categoría' }}</span>
    </div>

    {{-- Estado --}}
    <div class="mb-4">
        <span class="font-semibold text-gray-700">Estado:</span>

        @if($post->posted === 'yes')
            <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                Publicado
            </span>
        @else
            <span class="px-3 py-1 rounded-full text-sm bg-gray-200 text-gray-700">
                No publicado
            </span>
        @endif
    </div>

    {{-- Volver --}}
    <a href="{{ route('posts.index') }}"
       class="inline-block bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition">
        Volver
    </a>

</div>
@endsection
