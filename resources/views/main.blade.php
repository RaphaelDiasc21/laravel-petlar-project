@extends('layout.layout')

@section('content')

    @if(Session::get('nome') != null)
    <strong>Olá {{Session::get('nome')}}</strong>
    @endif

    <h1>Main page</h1>
@endsection