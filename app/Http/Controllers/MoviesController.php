<?php

namespace App\Http\Controllers;

use App\Models\CategoryMovie;
use App\Models\Movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['movies'] = Movies::all();
        return view('contents.movies.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = CategoryMovie::all();
        return view('contents.movies.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'file' => $request->file,
            'date_release' => $request->date_release,
        ];

        if (Request($data)) {
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'date_release' => 'nullable',
                'file' => 'mimes:jpg,jpeg,png|required',
            ]);
        }
        if ($file = $request->file('file')) {
            $validateData['file'] = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('movie-file', $fileName, 'public');
            $data['file'] = $fileName;
        }

        Movies::create($data);

        return redirect()
            ->route('movies.index')
            ->with('message', 'Success Added Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['movies'] = Movies::find($id);
        return view('contents.movies.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['movies'] = Movies::find($id);
        $data['category'] = CategoryMovie::all();
        return view('contents.movies.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $movies = Movies::find($id);

        $request->validate([
            'title' => 'required',
            'date_release' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'file' => 'mimes:jpg,jpeg,png',
        ]);

        $data = $request->all();

        if ($file = $request->file('file')) {
            $validateData['file'] = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('movie-file', $fileName, 'public');
            $data['file'] = $fileName;
        }

        $movies->update($data);

        return redirect()
            ->route('movies.index')
            ->with('message', 'Success Edit Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movies  $movies
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Movies::find($id);
        $user->delete();
        return redirect()->route('movies.index');
    }
}
