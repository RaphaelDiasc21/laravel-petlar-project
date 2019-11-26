@extends('layout.layout')

@section('content')
    <h1>Posts de adoções</h1>

    @if($posts != null)
        <div class="filter-area">
        <form action="{{route('adocoes.filtro')}}" method="POST">
                @csrf
                <h4>Aqui você pode filtrar suas buscas por adoções</h4>
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
        </div> <!-- Filtro -->

        <div class="posts-area"> <!-- Area dos posts -->
            @foreach($posts as $post)
                <div class="mt-3">
                    @component('component.post',['post'=>$post])
                    @endcomponent
                </div>
            @endforeach
            {{$posts->withPath('/adocoes')}}
        </div>
    @else
        <h3>Infelizmente ainda não encontramos nenhum post de animais em adoção</h3>
    @endif
@endsection

@section('scripts')
    <script src="{{url('static/js/cidades.js')}}"></script>
    <script>
            $(document).ready(function() {
               $("#carouselExampleControls").swiperight(function() {
                  $(this).carousel('prev');
                });
               $("#carouselExampleControls").swipeleft(function() {
                  $(this).carousel('next');
               });
            });
            </script>
@endsection