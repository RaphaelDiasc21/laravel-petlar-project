@extends('layout.layout')

@section('content')

    <form action="/logar" method="POST">
        @csrf

        Email:<input type="text" name="email" /><br>
        Senha: <input type="text" name="senha" /><br>

        <button type="submit">Entrar</button>

    </form>

    @if(Session::get('erro_login') != null)
        <strong>{{Session::get('erro_login')}}</strong>
    @endif
@endsection