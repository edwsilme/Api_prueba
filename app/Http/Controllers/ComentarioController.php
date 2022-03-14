<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comentario = Comentario::all();

        return \response($comentario);
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
            'post_id' =>'required',
            'contenido' => 'required|max:250'
        ]);

        $comentario = new Comentario();
        $comentario->post_id = $request->input('post_id');
        $comentario->contenido = $request->input('contenido');
        $comentario->save();

        return \response($comentario);
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
        $comentario = Comentario::findOrFail($id);

        return \response($comentario);
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
        $comentario = Comentario::findOrFail($id);
        $comentario->post_id = $request->input('post_id');
        $comentario->contenido = $request->input('contenido');
        $comentario->save();

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
        Comentario::destroy($id);

        return \response(content: "El comentario se ha eliminado correctamente");
    }
}
