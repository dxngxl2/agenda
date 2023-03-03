<x-layouts.app>

    <x-slot:head-title>Editar tag</x-slot:head-title>
    <x-slot:visible-title>Edita los detalles de la tag</x-slot:visible-title>

    <form action='{{ route('tags.update', $tag) }}' method='post'>
        @method('put')
        @csrf
        <x-tags.tag-fields>
            <x-slot:name_cat>
                {{ $tag->name }}
            </x-slot:name_cat>
        </x-tags.tag-fields>
    <input class='button' type='submit' name='crear' value='Editar categoría' />
    </form><br>

    <a href='{{ route('tags.index') }}'>Volver listado</a>

</x-layouts.app>
