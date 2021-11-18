@extends('plantilla')

@section('titulo', 'Ficha del post '. $post->id)

@section('contenido')
    <h1>{{ $post->titulo }}</h1>
    <section>
        <article>
            <div>
                {{ $post->contenido }}
            </div>
            <br>
            <footer>
                Escrito por {{$post->autor->login}} el

                {{ $post->created_at->locale('es_ES')->dayName}},
                {{ $post->created_at->day}} de
                {{ $post->created_at->locale('es_ES')->monthName }} de
                {{ $post->created_at->year}},
                {{ $post->created_at->format('H:m') }} horas
            </footer>
        </article>

        <a href="{{ route('posts.edit', $post) }}" class="btn btn-success">Editar</a>
        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline-block">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
              </svg>
            </button>
        </form>

        <br><br>
        <h3>Comentarios:</h3>
        @foreach($post->comentarios as $comentario)
        <div>
            <div>{{ $comentario->contenido }}</div>
            <footer>
                {{$comentario->autor->login}},
                {{ Carbon\Carbon::parse($comentario->created_at)->format('d/m/y') }}
            </footer>
        </div>
        <br>
        @endforeach

    </section>

@endsection
