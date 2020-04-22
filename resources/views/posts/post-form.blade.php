@extends('layout.layout')

@section('content')

    <h1>Postar post</h1>
    <div id="post-form-container" class="container" style="background-color: white;">
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    <form id="post-form" class="form-group" action="{{route('post.index')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="user_id" value="{{Session::get('id')}}"/>

        <label for="titulo">Titulo:</label>
        <input type="text" class="form-control" name="titulo" id="titulo" />

        <label style="display:block;">Descrição:</label>
        <textarea class="form-control" name="descricao"></textarea>

        <br>

        Pra qual finalidade ?<br>
        <div>
        adoções:<input type="radio" name="tipo" value="adocoes"/>
        encontrados:<input type="radio" name="tipo" value="encontrados"/>
        <label>perdidos:</label>
        <input type="radio" name="tipo" value="perdidos"/>
        </div>
        <br><br>

        <label>Cidade onde o animal se encontra:</label> 
        <select id="cidades" class="form-control col-3" name="cidade">
        </select>

        Seria esse animal ?
        Gato:<input type="radio" name="animal" value="gato"/>
        Cachorro:<input type="radio" name="animal" value="cachorro"/>
        <br><br>

        <input type="file" name="foto[]" multiple/>
        <button type="submit">Postar</button>

    </form>
    </div>
@endsection

@section('scripts')
    <script src="{{url('static/js/cidades.js')}}"></script>
    <script src="{{url('js/loader.js')}}"></script>
@endsection