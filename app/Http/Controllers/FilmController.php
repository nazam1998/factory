<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Http\Requests\FilmRequest;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::withTrashed()->oldest('title')->paginate(40);
        return view('films',compact('films'));
    }

    public function create()
{
    return view('create');
}
public function store(FilmRequest $filmRequest)
{
    Film::create($filmRequest->all());
    return redirect()->route('films.index')->with('info', 'Le film a bien été créé');
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
{
    return view('show', compact('film'));
}

public function edit(Film $film)
{
    return view('edit', compact('film'));
}
public function update(FilmRequest $filmRequest, Film $film)
{
    $film->update($filmRequest->all());
    return redirect()->route('films.index')->with('info', 'Le film a bien été modifié');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film->delete();
        return back()->with('info', 'Le film a bien été mis dans la corbeille.');
    }

    public function forceDestroy($id){
        Film::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return back()->with('info', 'Le film a bien été supprimé définitivement dans la base de données.');
    }
    public function restore($id){
        
        Film::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('info', 'Le film a bien été restauré.');
    }

    
}
