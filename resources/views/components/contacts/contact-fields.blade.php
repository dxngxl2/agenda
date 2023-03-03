<label for='name'>name</label>
<input type='text' id='name' name='name' value='{{ $contact->name ?? '' }}'/>
<br><br>

<label for='surnames'>surnames</label>
<input type='text' id='surnames' name='surnames' value='{{ $contact->surnames ?? '' }}'/>
<br><br>

<label for='phone'>Teléfono</label>
<input type='text' id='phone' name='phone' value='{{ $contact->phone ?? '' }}'/>
<br><br>

<label for='favorite'>Favorito</label>
<select id='favorite' name='favorite'>
    <optgroup label='Favoritos'>
        <option {{ ($contact->favorite ?? '') ? 'selected' : '' }} value='1'>★</option>
        <option {{ ($contact->favorite ?? '') ? 'selected' : '' }} value='0'>☆</option>
    </optgroup>
</select>

<p>Tags asociadas:</p>

@foreach ($tags as $tag)
    @php
        // Este isset es para detectar si estamos creando (false) o editando (true).
        if (isset($contact) && $contact->tags->contains($tag)) {
            $intensity = $contact->tags->find($tag)->pivot->intensity;
        } else {
            $intensity = "";
        }
    @endphp
    <input type='number' style='margin-left: 2em; width: 3em;' value='{{ $intensity }}'
           name='{{ \App\Http\Controllers\Contacts\ContactController::TAG_INTENSITY_PREFIX . $tag->id }}'/>
    %
    {{ $tag->name }}
    <br>
@endforeach
