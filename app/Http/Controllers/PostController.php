<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::all();

        return \response($post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'categoria_id' =>'required',
            'titulo' => 'required|max:150',
            'contenido' => 'required'
        ]);

        $post = new Post();
        $post->categoria_id = $request->input('categoria_id');
        $post->titulo = $request->input('titulo');
        $post->contenido = $request->input('contenido');
        $post->save();

        return \response($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrFail($id);

        return \response($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Post::findOrFail($id);
        $post->categoria_id = $request->input('categoria_id');
        $post->titulo = $request->input('titulo');
        $post->contenido = $request->input('contenido');
        $post->save();

        return \response(content: "El itemse ha actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::destroy($id);

        return \response(content: "El post se ha eliminado correctamente");
    }
}
