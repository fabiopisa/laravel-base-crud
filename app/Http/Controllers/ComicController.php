<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::orderBy('id','desc')->paginate(4);
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        //dd($data);
        $new_comic = new Comic();

        /* $new_comic->title=$data['title'];
        $new_comic->slug= Str::slug($data['title'], '-');
        $new_comic->description=$data['description'];
        $new_comic->image=$data['image'];
        $new_comic->price=$data['price'];
        $new_comic->series=$data['series'];
        $new_comic->date=$data['date'];
        $new_comic->type=$data['type']; */

        //devo generare io lo slug prima del fill facendolo in questo modo
        $data['slug'] =Str::slug($data['title'], '-');

        //con una sola riga scrivo tutto quello prima a patto che nel form gli id,name e for siano tutti uguali tra imput e label poi vado dentro Comic model è aggiungo quello che ho scritto nel documento
        $new_comic->fill($data);

        $new_comic->save();
        //dd($data);

        return redirect()->route('comics.show',$new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        //$comic = Comic::find($id);
        if($comic){
            return view('comics.show', compact('comic'));
        }
        abort(404,'Prodotto non presente nel database');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        if($comic){
            return view('comics.edit', compact('comic'));
        }
        abort(404,'Prodotto non presente nel database');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        $data =$request->all();
        $data['slug'] =Str::slug($data['title'], '-');
        $comic->update($data);
        return redirect()->route('comics.show',$comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('deleted', $comic->title);
    }
}
