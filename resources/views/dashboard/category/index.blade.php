@extends('dashboard.master')

@section('content')
<div class="flex justify-center">
    <div class="w-3/4 bg-white p-6 rounded-lg shadow">

        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            Tabla de Categorías
        </h2>

        <a href="{{ route('categories.create') }}"
           class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Nuevo
        </a>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-2 border-b">Título</th>
                        <th class="text-left px-4 py-2 border-b">Slug</th>
                        <th class="text-left px-4 py-2 border-b">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $cat)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border-b">{{ $cat->title }}</td>
                        <td class="px-4 py-2 border-b">{{ $cat->slug }}</td>
                        <td class="px-4 py-2 border-b whitespace-nowrap flex gap-2">

                            {{-- Ver --}}
                            <a href="{{ route('categories.show', $cat->id) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-600 transition">
                                Ver
                            </a>

                            {{-- Editar --}}
                            <a href="{{ route('categories.edit', $cat->id) }}"
                               class="bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-yellow-600 transition">
                                Editar
                            </a>

                            {{-- Eliminar --}}
                            <form action="{{ route('categories.destroy', $cat->id) }}" method="POST"
                                  onsubmit="return confirm('¿Seguro que deseas eliminar?')" class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-700 transition">
                                    Eliminar
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
