@extends('blog.master')

@section('content')

    <p>
        HOLA DOY DAVID
    </p>

    <x-ejemplos.alert >
        ALERTA 0
    </x-ejemplos.alert>

    <x-ejemplos.alert1 class="bg-red-400  px-4 py-8 rounded">
        HOLA ESTO ES UN ALERTA
        <x-slot:nombre>
            SOY YANDEL
        </x-slot:nombre>
    </x-ejemplos.alert1>

    <x-ejemplos.alert2 type="success">
        REGISTRO EXITOSO
    </x-ejemplos.alert2>

    <x-ejemplos.alert3 :disabled="true">Guardar</x-ejemplos.alert3>


    <x-ejemplos.alert4 type="info">
        <strong>Información:</strong> Este es un mensaje informativo.
    </x-ejemplos.alert4>



    <x-ejemplos.alert type="success" icon="fa-solid fa-check" class="shadow-lg">
        Registro exitoso
    </x-ejemplos.alert>


    <x-ejemplos.card class="bg-red-500 text-white" id="mensaje" data-type="error">
        <x-slot:title>
            Titulo de tarjeta
        </x-slot:title>
        Este es el contenido de la tarjeta

        <x-slot:footer>
            pie de la tarjeta
        </x-slot:footer>
    </x-ejemplos.card>


    <x-ejemplos.alert
        type="danger"
        :dismissible="true"
        class="mb-4 shadow-lg"
        id="error-notification"
    >
        <x-slot:iconSlot>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
        </x-slot:iconSlot>

        <x-slot:title>
            Error de validación
        </x-slot:title>

        <p class="mb-2">Se encontraron los siguientes errores:</p>
        <ul class="list-disc list-inside space-y-1 text-sm">
            <li>El campo email es obligatorio</li>
            <li>La contraseña debe tener al menos 8 caracteres</li>
            <li>Debes aceptar los términos y condiciones</li>
        </ul>

        <x-slot:actions>
            <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm font-medium">
                Corregir errores
            </button>
            <button class="text-red-700 hover:text-red-800 px-4 py-2 text-sm font-medium underline">
                Ver ayuda
            </button>
        </x-slot:actions>
    </x-ejemplos.alert>

@endsection
