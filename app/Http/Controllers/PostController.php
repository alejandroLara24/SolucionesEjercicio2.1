<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

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
        //return view('posts_listado');
        //return view('posts.index');
        $posts = Post::with('autor')->orderBy('titulo', 'ASC')->paginate(5);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return 'Nuevo post';
        return redirect()->route('inicio');
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
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //return 'Edicion de post '. $id;
        return redirect()->route('inicio');
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
        Post::findOrFail($id)->delete();
        return redirect()->route('posts.index');
    }

    public function nuevoPrueba()
    {
        //
        $x = rand();
        $post = new Post();
        $post->titulo = 'Titulo '. $x;
        $post->contenido = 'Contenido '. $x;
        $post->autor_id = User::inRandomOrder()->first()->id;
        $post->save();
        return redirect()->route('posts.show', $post->id);
    }

    public function editarPrueba($id)
    {
        $x = rand();
        $post = Post::findOrFail($id);
        $post->titulo = 'Titulo '. $x;
        $post->contenido = 'Contenido '. $x;
        $post->autor_id = User::inRandomOrder()->first()->id;
        $post->save();
        return redirect()->route('posts.show', $post->id);
    }
}
