<x-layouts.app>

    <x-slot:head-title>Crear tag</x-slot:head-title>
    <x-slot:visible-title>Crea una tag</x-slot:visible-title>

    <form action='{{ route('tags.store') }}' method='post'>
        @method('post')
        @csrf

        <x-tags.tag-fields/>

        <input class='button' type='submit' name='crear' value='Crear categoría'/>
    </form><br/>

    <a href='{{ route('tags.index') }}'>Volver al listado</a>

</x-layouts.app>
