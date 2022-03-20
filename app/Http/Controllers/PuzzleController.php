<?php

namespace App\Http\Controllers;

use App\Models\Puzzle;
use App\Http\Requests\StorePuzzle;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;


class PuzzleController extends Controller
{
    private $validation_rules = [
        'name' => 'required|min:3|max:255',
        'description' => ['required', 'min:5'],
        'type' => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $puzzles = Puzzle::all();
        return Inertia::render('Puzzles/Index', ['puzzles' => $puzzles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Puzzles/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePuzzle $request)
    {
        $request->validate($this->validation_rules);

        if ($request->hasfile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        } else {
            $image_path = NULL;
        }

        Puzzle::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'image' => $image_path,
        ]);

        return Redirect::route('puzzles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Puzzle  $puzzle
     * @return \Illuminate\Http\Response
     */
    public function show(Puzzle $puzzle)
    {
        return Inertia::render('Puzzles/Show', ['puzzle' => $puzzle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Puzzle  $puzzle
     * @return \Illuminate\Http\Response
     */
    public function edit(Puzzle $puzzle)
    {
        return Inertia::render('Puzzles/Edit', ['puzzle' => $puzzle]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Puzzle  $puzzle
     * @return \Illuminate\Http\Response
     */
    public function update(StorePuzzle $request, Puzzle $puzzle)
    {
        $request->validate($this->validation_rules);

        if ($request->hasfile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        } else {
            $image_path = $puzzle->image;
        }

        $puzzle->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'image' => $image_path,
        ]);

        return Redirect::route('puzzles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Puzzle  $puzzle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puzzle $puzzle)
    {
        $image_path = '/public/' . $puzzle->image;
        if (
            Storage::disk('local')->exists($image_path) and
            Storage::disk('local')->get($image_path) != null
        ) {
            Storage::disk('local')->delete($image_path);
        } 
        $puzzle->delete();
        return Redirect::route('puzzles.index');
    }
}
