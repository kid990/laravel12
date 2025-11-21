
{{-- Componente alert.blade.php --}}
<div {{ $attributes
        ->merge(['id' => 'alert-box'])
        ->class([
            'p-4 rounded border-l-4 shadow-md',
            'bg-blue-50 text-blue-800 border-blue-500' => $type === 'info',
            'bg-green-50 text-green-800 border-green-500' => $type === 'success',
            'bg-yellow-50 text-yellow-800 border-yellow-500' => $type === 'warning',
            'bg-red-50 text-red-800 border-red-500' => $type === 'danger',
            'bg-purple-50 text-purple-800 border-purple-500' => $type === 'primary',
            'bg-gray-50 text-gray-800 border-gray-500' => $type === 'secondary',
        ]) }}>
    {{ $slot }}
</div>
