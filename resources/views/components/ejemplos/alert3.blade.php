
{{-- ATRIBUTO CON CLASE --}}

<div {{ $attributes->class([
    'px-4 py-2 rounded',
    'opacity-50' => $disabled,
    'cursor-not-allowed' => $disabled,
    'bg-gray-200' => $disabled,
]) }}>
    {{ $slot }}
</div>

