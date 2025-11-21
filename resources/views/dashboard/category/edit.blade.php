@extends('dashboard.master')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">

        <h2 class="text-2xl font-bold text-gray-800 mb-6">
            Editar Categoría
        </h2>

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PATCH')

            {{-- Campo Título --}}
            <div class="mb-5">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    value="{{ $category->title }}"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            {{-- Campo Slug --}}
            <div class="mb-5">
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                <input
                    type="text"
                    name="slug"
                    id="slug"
                    value="{{ $category->slug }}"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            {{-- Botones --}}
            <div class="flex gap-3">
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 transition"
                >
                    Actualizar
                </button>

                <a
                    href="{{ route('categories.index') }}"
                    class="bg-gray-500 text-white px-5 py-2.5 rounded-lg hover:bg-gray-600 transition"
                >
                    Cancelar
                </a>
            </div>

        </form>

    </div>
@endsection
