@extends('blog.master')

@section('content')

    <p>{{$post->title}}</p>
    <p>{{$post->descripcion}}</p>

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


@endsection
