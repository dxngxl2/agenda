<x-layouts.app>

    <x-slot:head-title>Mostrar tag</x-slot:head-title>
    <x-slot:visible-title>Mostrar los detalles de la tag</x-slot:visible-title>

    <p>name: {{$tag->name}}</p>

    <a href='{{ route('tags.edit', $tag) }}'>Editarla</a>

    <br/><br/>

    <a href='{{ route('tags.index') }}'>Volver al listado</a>

</x-layouts.app>
