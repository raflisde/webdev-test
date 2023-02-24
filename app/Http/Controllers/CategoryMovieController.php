<?php

namespace App\Http\Controllers;

use App\Models\CategoryMovie;
use Illuminate\Http\Request;

class CategoryMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['category'] = CategoryMovie::all();
        return view('contents.category-movie.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => $request->name,
        ];

        if (Request($data)) {
            $request->validate([
                'name' => 'required',
            ]);
        }

        $data = $request->all();

        CategoryMovie::create($data);

        return redirect()
            ->route('category-movie.index')
            ->with('message', 'Success Added Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryMovie  $categoryMovie
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryMovie $categoryMovie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryMovie  $categoryMovie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category'] = CategoryMovie::find($id);
        return view('contents.category-movie.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryMovie  $categoryMovie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = CategoryMovie::find($id);
        if ($category) {
            $data = [
                'name' => $request->name,
            ];

            $category->update($data);
            return redirect()
                ->route('category-movie.index')
                ->with('message', 'Success Edit Data!');
        } else {
            return redirect()->route('category-movie.index');
        }
        $data = $request->all();
        $category->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryMovie  $categoryMovie
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryMovie $categoryMovie)
    {
        //
    }
}
