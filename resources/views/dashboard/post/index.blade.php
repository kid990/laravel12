@extends('dashboard.master')

@section('content')
<div class="flex justify-center">
    <div class="w-3/4 bg-white p-6 rounded-lg shadow">

        <h1 class="text-2xl font-bold text-gray-800 mb-4">
            Lista de Posts
        </h1>

        <a href="{{ route('posts.create') }}"
           class="inline-block mb-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
            Crear
        </a>

        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left px-4 py-2 border-b">Título</th>
                        <th class="text-left px-4 py-2 border-b">Contenido</th>
                        <th class="text-left px-4 py-2 border-b">Categoría</th>
                        <th class="text-left px-4 py-2 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b align-top">
                                {{ $post->title }}
                            </td>
                            <td class="px-4 py-2 border-b align-top">
                                {{ $post->content }}
                            </td>
                            <td class="px-4 py-2 border-b align-top">
                                {{ $post->category->slug }}
                            </td>
                            <td class="px-4 py-2 border-b whitespace-nowrap align-top">
                                {{-- Ver --}}
                                <a href="{{ route('posts.show', $post->id) }}"
                                   class="inline-block bg-blue-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-blue-600 transition">
                                    Ver
                                </a>

                                {{-- Editar --}}
                                <a href="{{ route('posts.edit', $post->id) }}"
                                   class="inline-block bg-yellow-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-yellow-600 transition ml-1">
                                    Editar
                                </a>

                                {{-- Borrar --}}
                                <form action="{{ route('posts.destroy', $post->id) }}"
                                      method="POST"
                                      class="inline"
                                      onsubmit="return confirm('¿Seguro?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-700 transition ml-1">
                                        Borrar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Paginación --}}
        <div class="mt-4">
            {{ $posts->links() }}
        </div>

    </div>
</div>
@endsection
