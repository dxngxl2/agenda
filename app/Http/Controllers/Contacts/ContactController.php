<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Contact;
use Illuminate\Http\Request;
use function redirect;
use function view;

class ContactController extends Controller
{
    public const TAG_INTENSITY_PREFIX = 'intensity_tag_';

    public function index() // Display a listing of the resource.
    {
        $contacts = Contact::orderBy('name')->get();
        return view('pages.contacts.index', compact('contacts'));
    }

    public function create() // Show the form for creating a new resource.
    {
        $tags = Tag::orderBy('name')->get();
        return view('pages.contacts.create', compact('tags'));
    }

    public function store(Request $request) // Store a newly created resource in storage.
    {
        // TODO Ojo, mucho copypaste evitable entre estos dos sitios.

        $this->validate($request, [
            'name' => 'required',
            'surnames' => 'required',
            'phone' => 'required',
            'favorite' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->surnames = $request->surnames;
        $contact->phone = $request->phone;
        $contact->favorite = $request->favorite;
        $contact->save();

        // Al finalizar, este array deberá tener un formato como el que sigue: [1 => ['intensity' => 33], 3 => ['intensity' => 66], 4 => ['intensity' => 99]];
        $asociaciones = [];
        foreach ($request->all() as $clave => $valor) {
            if (substr($clave, 0, strlen(Self::TAG_INTENSITY_PREFIX)) == Self::TAG_INTENSITY_PREFIX && $valor != Null) {
                $tag_id = substr($clave, strlen(Self::TAG_INTENSITY_PREFIX)); // Obtiene el resto de la cadena desde que termina el prefijo.
                // Se añade un elemento al array, la clave es el id de la categoría y el valor es un array con los datos de la tabla pivot. Este es el formato en el que hay que proporcionar cada UNO de los elementos del array.
                $asociaciones[$tag_id] = ['intensity' => $valor];
            }
        };
        $contact->tags()->sync($asociaciones);

        return redirect()->route('contacts.index');
    }

    public function show(Contact $contact) // Display the specified resource.
    {
        return view('pages.contacts.show', compact('contact'));
    }

    public function edit(Contact $contact) // Show the form for editing the specified resource.
    {
        $tags = Tag::orderBy('name')->get();
        return view('pages.contacts.edit', compact('contact' , 'tags'));
    }

    public function update(Request $request, Contact $contact) // Update the specified resource in storage.
    {
        // TODO Ojo, mucho copypaste evitable entre estos dos sitios: usar subclase de Request y poner la validación ahí.

        $this->validate($request, [
            'name' => 'required',
            'surnames' => 'required',
            'phone' => 'required',
            'favorite' => 'required',
        ]);

        $contact->name = $request->name;
        $contact->surnames = $request->surnames;
        $contact->phone = $request->phone;
        $contact->favorite = $request->favorite;
        $contact->save();

        // Al finalizar, este array deberá tener un formato como el que sigue:
        // [
        //    1 => ['intensity' => 33],
        //    3 => ['intensity' => 66],
        //    4 => ['intensity' => 99]
        // ];
        $asociaciones = [];
        foreach ($request->all() as $clave => $valor) {
            if (substr($clave, 0, strlen(Self::TAG_INTENSITY_PREFIX)) == Self::TAG_INTENSITY_PREFIX && $valor != Null) {
                $tag_id = substr($clave, strlen(Self::TAG_INTENSITY_PREFIX)); // Obtiene el resto de la cadena desde que termina el prefijo.
                // Se añade un elemento al array, la clave es el id de la categoría y el valor es un array con los datos de la tabla pivot. Este es el formato en el que hay que proporcionar cada UNO de los elementos del array.
                $asociaciones[$tag_id] = ['intensity' => $valor];
            }
        };
        $contact->tags()->sync($asociaciones);

        return redirect()->route('contacts.index');
    }

    public function toggleFavorite(Contact $contact)
    {
        $contact->favorite = !$contact->favorite;
        $contact->save();

        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact) // Remove the specified resource from storage.
    {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}
