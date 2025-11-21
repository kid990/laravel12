<div {{ $attributes->class([
    'p-4 rounded shadow',
    'bg-green-500 text-white' => $type === 'success',
    'bg-red-500 text-white' => $type === 'danger',
    'bg-yellow-500 text-white' => $type === 'warning',
]) }}>
    {{ $slot }}
</div>
