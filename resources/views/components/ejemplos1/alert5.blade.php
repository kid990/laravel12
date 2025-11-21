{{-- resources/views/components/ejemplos1/alert.blade.php --}}
@props([
    'type' => 'info',
    'dismissible' => false,
    'icon' => null
])

<div {{ $attributes->merge(['role' => 'alert'])->class([
    'px-4 py-3 rounded-lg relative flex items-start gap-3 border',
    'bg-green-50 border-green-400 text-green-700' => $type === 'success',
    'bg-red-50 border-red-400 text-red-700' => $type === 'danger',
    'bg-yellow-50 border-yellow-400 text-yellow-700' => $type === 'warning',
    'bg-blue-50 border-blue-400 text-blue-700' => $type === 'info',
    'bg-purple-50 border-purple-400 text-purple-700' => $type === 'primary',
    'pr-12' => $dismissible, // Espacio extra para el botón de cerrar
]) }}>

    {{-- Slot nombrado para icono --}}
    @if($icon || isset($iconSlot))
        <div class="flex-shrink-0 pt-0.5">
            @if(isset($iconSlot))
                {{ $iconSlot }}
            @else
                <i class="{{ $icon }} text-xl"></i>
            @endif
        </div>
    @endif

    {{-- Contenedor principal --}}
    <div class="flex-1">
        {{-- Slot nombrado para título --}}
        @isset($title)
            <div class="font-bold text-lg mb-1">
                {{ $title }}
            </div>
        @endisset

        {{-- Slot principal (contenido) --}}
        <div>
            {{ $slot }}
        </div>

        {{-- Slot nombrado para acciones/footer --}}
        @isset($actions)
            <div class="mt-3 flex gap-2">
                {{ $actions }}
            </div>
        @endisset
    </div>

    {{-- Botón de cerrar si es dismissible --}}
    @if($dismissible)
        <button
            type="button"
            class="absolute top-0 right-0 px-4 py-3 text-2xl font-bold leading-none hover:opacity-75 transition-opacity"
            onclick="this.parentElement.remove()"
            aria-label="Cerrar"
        >
            ×
        </button>
    @endif
</div>
