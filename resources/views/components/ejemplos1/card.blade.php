<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-gray-100 px-6 py-4 border-b border-gray-200">
        {{ $title }}
    </div>

    {{--ATRIBUTOS--}}
    <div {{$attributes}}>
        {{ $slot }}
    </div>

    <div class="bg-gray-50 px-6 py-3 border-t border-gray-200">
        {{ $footer }}


    </div>


</div>
