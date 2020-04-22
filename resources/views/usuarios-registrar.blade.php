@extends('layout.layout')

@section('content')
@foreach($errors->all() as $error)
<div class="alert alert-danger">{{$error}}</div>
@endforeach
<form action="{{route('usuario.registrar.dados')}}" method="POST">
    @csrf
    Nome:<input type="text" name="nome" />
    Email:<input type="text" name="email" />
    Senha:<input type="password" name="senha" />
    Confirmar senha:<input type="password" name="senha_confirmation" />
    <button class="btn btn-raised btn-primary" type="submit">Cadastrar</button>
</form>
@endsection