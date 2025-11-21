@extends('dashboard.master')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-bold text-gray-800 mb-6">Crear Post</h2>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Título --}}
        <div class="mb-5">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
            <input type="text"
                   id="title"
                   name="title"
                   value="{{ old('title') }}"
                   class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
            @error('title')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        {{-- Slug --}}
        <div class="mb-5">
            <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
            <input type="text"
                   id="slug"
                   name="slug"
                   value="{{ old('slug') }}"
                   class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
            @error('slug')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        {{-- Descripción --}}
        <div class="mb-5">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
            <input type="text"
                   id="description"
                   name="description"
                   value="{{ old('description') }}"
                   class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500">
            @error('description')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        {{-- Contenido --}}
        <div class="mb-5">
            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">Contenido</label>
            <textarea id="content"
                      name="content"
                      class="w-full border border-gray-300 rounded-lg p-2.5 h-28 focus:ring-2 focus:ring-blue-500">{{ old('content') }}</textarea>
            @error('content')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        {{-- Imagen --}}
        <div class="mb-5">
            <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
            <input type="file"
                   id="image"
                   name="image"
                   accept="image/*"
                   class="w-full border border-gray-300 rounded-lg p-2.5 cursor-pointer focus:ring-2 focus:ring-blue-500">
            @error('image')
                <small class="text-red-600">{{ $message }}</small>
            @enderror
        </div>

        {{-- Estado "posted" --}}
        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
            <select name="posted"
                    class="w-full border border-gray-300 rounded-lg p-2.5 bg-white focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Seleccionar estado</option>
                <option value="yes">Publicado</option>
                <option value="not">No publicado</option>
            </select>
        </div>

        {{-- Categoría --}}
        <div class="mb-5">
            <label class="block text-sm font-medium text-gray-700 mb-1">Categoría</label>
            <select name="category_id"
                    class="w-full border border-gray-300 rounded-lg p-2.5 bg-white focus:ring-2 focus:ring-blue-500">
                <option value="" selected>Seleccionar categoría</option>
                @foreach ($categories as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->title }}</option>
                @endforeach
            </select>
        </div>

        {{-- Botones --}}
        <div class="flex justify-end gap-3 mt-6">
            <a href="{{ route('posts.index') }}"
               class="bg-gray-500 text-white px-6 py-2.5 rounded-lg hover:bg-gray-600 transition">
                Cancelar
            </a>

            <button type="submit"
                    class="bg-green-600 text-white px-6 py-2.5 rounded-lg shadow hover:bg-green-700 transition">
                Guardar Post
            </button>
        </div>

    </form>

</div>
@endsection
