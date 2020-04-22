@extends('layout.layout')

@section('content')
<h1>Posts de {{$tipo}}</h1>

    @if($posts != null)
        <div class="filter-area">
            <div class="filter-wrapper">
                <h3>Aqui você pode filtrar suas buscas por {{$tipo}}</h3>
                <form action="/{{$tipo}}" method="POST">
                        @csrf
                        <div style="display: inline-block; width: 50%;">
                        <label>Cidade</label><br>
                        <select style="display:inline-block; width:70%;" id="cidades" class="form-control" name="cidade">
                        </select>
                        </div>
                        <div style="display:inline-block">
                            <label>Animal:</label><br>
                            Gato:<input type="radio" name="animal" value="gato"/>
                            Cachorro:<input type="radio" name="animal" value="cachorro"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
            </div>
        </div> <!-- Filtro -->
        <div class="container">
        <div class="posts-area row w-100 mb-5">
            @foreach($posts as $post)
                <div class="col-sm-12 col-md-4 mt-3">
                    @component('component.post',['post'=>$post])
                    @endcomponent
                </div>
            @endforeach
        </div>
        {!! $posts->render() !!}
        </div>
    @else
        <h3>Infelizmente ainda não encontramos nenhum post de animais em adoção</h3>
    @endif
@endsection

@section('scripts')
    <script src="{{url('static/js/cidades.js')}}"></script>
@endsection