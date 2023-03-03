<x-layouts.app>

    <x-slot:head-title>Crear contacto</x-slot:head-title>
    <x-slot:visible-title>Crea un contacto</x-slot:visible-title>

    <form action='{{ route('contacts.store') }}' method='post'>
        @method('post')
        @csrf

        <x-contacts.contact-fields :tags='$tags' />

        <input class='button' type='submit' name='crear' value='Crear contact' />
    </form><br/>

    <a href='{{ route('contacts.index') }}'>Volver al listado</a>

</x-layouts.app>
