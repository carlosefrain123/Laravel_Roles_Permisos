<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors=[
            'red'=>'Color Rojo',
            'yellow'=>'Color Amarillo',
            'green'=>'Color Verde',
            'blue'=>'Color Azul',
            'indigo'=>'Color Indigo',
            'purple'=>'Color Purpura',
            'pink'=>'Color Rosa',
        ];
        /* $tags = Tag::all(); */ // Retrieve all tags from the database
        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:tags',
            'color'=>'required',
        ]);
        $tag=Tag::create($request->all());
        return redirect()->route('admin.tags.create',$tag)->with('info','La categoria se guardó con éxito');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $colors=[
            'red'=>'Color Rojo',
            'yellow'=>'Color Amarillo',
            'green'=>'Color Verde',
            'blue'=>'Color Azul',
            'indigo'=>'Color Indigo',
            'purple'=>'Color Purpura',
            'pink'=>'Color Rosa',
        ];
        return view('admin.tags.edit',compact('tag','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:tags,slug,$tag->id",
            'color'=>'required',
        ]);
        $tag->update($request->all());
        return redirect()->route('admin.tags.edit',$tag)->with('info','La categoria se editó con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info','La categoria se borró con éxito');
    }
}
