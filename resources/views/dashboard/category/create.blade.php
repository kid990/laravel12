@extends('dashboard.master')

@section('content')
    <div class="max-w-xl mx-auto p-6 bg-white shadow-md rounded-lg">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">CREAR CATEGORÍA</h2>

        <form action="{{ route('categories.store') }}" method="post">
            @csrf

            {{-- Campo Título --}}
            <div class="mb-5">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                    Título
                </label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            {{-- Campo Slug --}}
            <div class="mb-5">
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">
                    Slug
                </label>
                <input
                    type="text"
                    id="slug"
                    name="slug"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <a href="{{ route('categories.index') }}" class="bg-gray-600 text-white px-5 py-2.5 rounded-lg hover:bg-gray-700 transition"> Cancelar</a>

            {{-- Botón --}}
            <button
                type="submit"
                class="bg-blue-600 text-white px-5 py-2.5 rounded-lg hover:bg-blue-700 transition"
            >
                Enviar
            </button>

        </form>

    </div>
@endsection
