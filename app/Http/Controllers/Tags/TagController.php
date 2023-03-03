<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use function redirect;
use function view;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('name')->get();
        return view('pages.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('pages.tags.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tags.index');
    }

    public function show(Tag $tag)
    {
        return view('pages.tags.show', compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('pages.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);

        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('tags.index');

    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index');
    }
}
