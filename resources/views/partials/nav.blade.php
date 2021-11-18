<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
    <a class="navbar-brand" href="{{ route('inicio') }}">Pepito grillo Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('inicio') }}">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{-- route('posts_listado') --}}{{ route('posts.index') }}">Listado de posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.create') }}">Nuevo post</a>
            </li>
        </ul>
    </div>
</nav>
