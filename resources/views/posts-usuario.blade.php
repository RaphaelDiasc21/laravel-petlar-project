@extends('layout.layout')

@section('content')
    <h1>Meus posts</h1>

    @if($posts != null)
        <div class="posts-area">
                @foreach($posts as $post)
                <div class="row" class="post">
                    <div class="col-6">
                        <div class="carousel">
                            <img class="w-100" src="{!! url($post->url) !!}" />
                        </div>
                    </div>
                    <div class="col-6 post__descriptions">
                        <h4>{{$post->titulo}}</h4>

                        <p style="display: inline-block; margin-right:20px;">Animal: {{$post->animal}}</p>
                        <p style="display: inline-block">Cidade:{{$post->cidade}}</p>
                        <p>Descrição: {{$post->descricao}}</p>
                    </div>
                    <form action="{{url('/posts-usuario', ['id' => $post->id])}}" method="POST">
                        @method('delete')
                        @csrf

                        @if($post->tipo == 'Adocoes')
                           <button type="submit">Animal encontrou um lar</button>
                        @elseif($post->tipo == 'Perdidos')
                            <button type="submit">Animal encontrado</button>
                        @else 
                            <button type="submit">Dono achou animal</button>
                        @endif 
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <h3>Infelizmente ainda não encontramos nenhum post de animais em adoção</h3>
    @endif
@endsection

@section('scripts')
    <script src="{{url('static/js/cidades.js')}}"></script>
@endsection