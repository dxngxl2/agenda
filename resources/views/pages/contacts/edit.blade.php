<x-layouts.app>

    <x-slot:head-title>Editar contacto</x-slot:head-title>
    <x-slot:visible-title>Edita los detalles del contacto</x-slot:visible-title>

    <form action='{{ route('contacts.update', $contact) }}' method='post'>
        @method('put')
        @csrf

        <x-contacts.contact-fields :contact='$contact' :tags='$tags' />

        <br>

        <button type='submit'>Actualizar</button>
    </form><br>

    <a href='{{ route('contacts.index') }}'>Volver al listado</a>

</x-layouts.app>
