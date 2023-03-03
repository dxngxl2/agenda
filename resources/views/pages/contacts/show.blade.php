<x-layouts.app>

    <x-slot:head-title>Mostrar contacto</x-slot:head-title>
    <x-slot:visible-title>Mostrar los detalles del contacto</x-slot:visible-title>

    <p>{{$contact->name}}</p>
    <p>{{$contact->surnames}}</p>
    <p>{{$contact->phone}}</p>
    <p>{{$contact->favorite}}</p>
    <p>
        Tag(s):
        @foreach($contact->tags as $tag)
            <a href='{{ route('tags.show', $tag ) }}'>{{ $tag->name }} </a>
        @endforeach
    </p>

    <a href='{{ route('contacts.edit', $contact) }}'>Editarlo</a>

    <br/><br/>

    <form id='{{ $contact->id }}' action='{{ route('contacts.destroy', $contact) }}'
          method='post'>
        @method('delete')

        <input class='button' type='submit' name='crear' value='Eliminar contact' />
    </form>

    <br>

    <a href='{{ route('contacts.index') }}'>Volver al listado de contacts.</a>

</x-layouts.app>
