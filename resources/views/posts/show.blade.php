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
