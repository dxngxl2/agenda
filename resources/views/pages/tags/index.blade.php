<x-layouts.app>

    <x-slot:headHeader>Tags</x-slot:headHeader>
    <x-slot:visible-title>Listado de tags</x-slot:visible-title>

    <table>

        <tr>
            <th>Tag</th>
        </tr>

        @foreach ($tags as $tag)
            <tr>
                <td>
                    <a href='{{ route('tags.show', $tag) }}'>{{ $tag->name }}</a>
                </td>
                <td>
                    <form action='{{ route('tags.destroy', $tag) }}' method='post'>
                        @method('delete')
                        @csrf

                        <button type='submit'><i class="fa fa-trash"></i></button></button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

    <br>

    <button><a href='{{ route('tags.create') }}'>Crear</a></button><br><br>

</x-layouts.app>
