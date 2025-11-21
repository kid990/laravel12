<div class="overflow-x-auto">
    <table class="min-w-full border border-gray-300 rounded-lg overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                @foreach($columnas as $col)
                    <th class="text-left px-4 py-2 border-b">{{ $col }}</th>
                @endforeach

                @if($acciones)
                    <th class="text-left px-4 py-2 border-b">Acciones</th>
                @endif
            </tr>
        </thead>

        <tbody>
            @foreach($data as $item)
                <tr class="hover:bg-gray-50">

                    {{-- columnas dinámicas --}}
                    @foreach($columnas_key as $key)
                        <td class="px-4 py-2 border-b align-top">
                            {{ data_get($item, $key) }}
                        </td>
                    @endforeach

                    {{-- acciones dinámicas --}}
                    @if($acciones)
                        <td class="px-4 py-2 border-b whitespace-nowrap align-top">
                            {!! $acciones($item) !!}
                        </td>
                    @endif

                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- paginación --}}
    @if(method_exists($data, 'links'))
        <div class="mt-4">
            {{ $data->links() }}
        </div>
    @endif
</div>
