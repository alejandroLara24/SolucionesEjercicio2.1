<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
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
        //return 'Nuevo post';
        //return redirect()->route('inicio');
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->autor()->associate(User::findOrFail(1));
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        //return 'Edicion de post '. $id;
        //return redirect()->route('inicio');
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->titulo = $request->get('titulo');
        $post->contenido = $request->get('contenido');
        $post->save();

        return view('posts.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comentario::where('post_id', $id)->delete();
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
        $post->save();
        return redirect()->route('posts.show', $post->id);
    }

    public function editarPrueba($id)
    {
        $x = rand();
        $post = Post::findOrFail($id);
        $post->titulo = 'Titulo '. $x;
        $post->contenido = 'Contenido '. $x;
        $post->save();
        return redirect()->route('posts.show', $post->id);
    }
}

