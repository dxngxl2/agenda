<x-layouts.app>

    <x-slot:head-title>Contactos</x-slot:head-title>
    <x-slot:visible-title>Listado de contactos</x-slot:visible-title>

    <table>
        <tr>
            <th>Contacto</th>
            <th>Fav.</th>
            <th>Tag(s)</th>

        </tr>
        @foreach ($contacts as $contact)
            <tr>
                <td>
                    <a href='{{ route('contacts.show', $contact) }}'>{{ $contact->surnames }}, {{ $contact->name }}</a>
                </td>

                <td>
                    <a href='{{ route('contacts.toggle_favorite', $contact) }}'><i class='{{$contact->favorite ? 'fa-solid fa-star' : 'fa-regular fa-star'}}'></i></a>
                </td>

                <td>
                    @foreach ($contact->tags as $tag)
                        <a href='{{ route('tags.show', $tag ) }}'>{{ $tag->pivot->intensity . '% ' . $tag->name }}</a>@if (!$loop->last){{ ', ' }}@endif
                    @endforeach
                </td>

                <td>
                    <form action='{{ route('contacts.destroy', $contact) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit'><i class="fa fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <br>

    <button><a href='{{ route('contacts.create') }}'>Crear</a></button><br><br>

</x-layouts.app>
