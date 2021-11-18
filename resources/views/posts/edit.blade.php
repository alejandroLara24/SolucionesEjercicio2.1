@extends('plantilla')

@section('titulo', 'Editando el post '. $post->id)

@section('contenido')
    <h1>Editando el post {{ $post->id }}</h1>
    <section>
        <form action="{{ route('posts.update', $post) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $errors->any() ? old('titulo') : $post->titulo }}">
                @if ($errors->has('titulo'))
                    <div class="text-danger">
                        {{ $errors->first('titulo') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="contenido">Contenido</label>
                <textarea name="contenido" id="contenido" cols="30" rows="10" class="form-control">{{ $errors->any() ? old('contenido') : $post->contenido }}</textarea>
                @if ($errors->has('contenido'))
                    <div class="text-danger">
                        {{ $errors->first('contenido') }}
                    </div>
                @endif
            </div>

            <input type="submit" name="enviar" value="Enviar" class="btn btn-primary btn-block">
            <br>
            <a href="{{ url()->previous() }}" class="btn btn-danger btn-block">Cancelar</a>
        </form>
    </section>

@endsection
