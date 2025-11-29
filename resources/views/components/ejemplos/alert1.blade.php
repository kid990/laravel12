
{{-- SLOT CON NOMBRE, ATRIBUTOS CON MERGE --}}

<div>

    <div class="bg-black-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
        {{$slot}}
    </div>

    <div {{$attributes->merge(['class'=>' border-orange text-orange-700'])}}>
        {{$nombre}}
    </div>


</div>
