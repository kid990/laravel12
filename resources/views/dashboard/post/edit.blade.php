@extends('dashboard.master')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Editar Post</h2>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf

        {{-- Título --}}
        <div class="mb-5">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $post->title) }}"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500"
            >
            @error('title')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        {{-- Slug --}}
        <div class="mb-5">
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
            <input
                type="text"
                id="slug"
                name="slug"
                value="{{ old('slug', $post->slug) }}"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500"
            >
            @error('slug')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        {{-- Descripción --}}
        <div class="mb-5">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
            <textarea
                id="description"
                name="description"
                rows="3"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500"
            >{{ old('description', $post->description) }}</textarea>
            @error('description')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        {{-- Contenido --}}
        <div class="mb-5">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenido</label>
            <textarea
                id="content"
                name="content"
                rows="4"
                class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500"
            >{{ old('content', $post->content) }}</textarea>
            @error('content')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        {{-- Imagen --}}
        <div class="mb-5">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>

            @if ($post->image)
                <div class="mb-3">
                    <img
                        src="{{ asset('storage/' . $post->image) }}"
                        alt="Imagen actual"
                        class="rounded-lg shadow max-w-xs"
                    >
                    <p class="text-gray-500 text-sm mt-1">Imagen actual</p>
                </div>
            @endif

            <input
                type="file"
                id="image"
                name="image"
                accept="image/*"
                class="w-full border border-gray-300 rounded-lg p-2.5 cursor-pointer focus:ring-2 focus:ring-blue-500"
            >
            <small class="text-gray-500 text-sm">Deja vacío si no deseas cambiar la imagen</small>

            @error('image')
                <small class="text-red-600 block">{{ $message }}</small>
            @enderror
        </div>

        {{-- Publicado --}}
        <div class="mb-5">
            <label for="posted" class="block text-sm font-medium text-gray-700 mb-1">Publicado</label>
            <select
                name="posted"
                id="posted"
                class="w-full border border-gray-300 rounded-lg p-2.5 bg-white focus:ring-2 focus:ring-blue-500"
            >
                <option value="">Seleccionar si está publicado</option>
                <option value="not" {{ old('posted', $post->posted) == 'not' ? 'selected' : '' }}>No</option>
                <option value="yes" {{ old('posted', $post->posted) == 'yes' ? 'selected' : '' }}>Sí</option>
            </select>

            <small class="text-gray-500 text-sm">
                Estado actual: {{ $post->posted ?? 'No especificado' }}
            </small>
        </div>

        {{-- Categoría --}}
        <div class="mb-5">
            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
            <select
                id="category_id"
                name="category_id"
                class="w-full border border-gray-300 rounded-lg p-2.5 bg-white focus:ring-2 focus:ring-blue-500"
            >
                <option value="">Seleccionar categoría</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>

            <small class="text-gray-500 text-sm">
                Categoría actual: {{ $post->category->title ?? 'Sin categoría' }}
            </small>
        </div>

        {{-- Botones --}}
        <div class="flex justify-end gap-3 mt-6 flex-wrap">
            <a
                href="{{ route('posts.index') }}"
                class="bg-gray-500 text-white px-6 py-2.5 rounded-lg hover:bg-gray-600 transition"
            >
                Cancelar
            </a>

            <button
                type="submit"
                class="bg-green-600 text-white px-6 py-2.5 rounded-lg shadow hover:bg-green-700 transition"
            >
                Guardar Post
            </button>
        </div>

    </form>

</div>
@endsection
